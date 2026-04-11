<?php
/**
 * process-contact.php
 * Handles the contact form submission.
 * Returns to contact.php with a session status flag.
 *
 * Email is sent via PHPMailer (SMTP) using credentials from includes/config.php.
 * Lead data is optionally appended to Google Sheets via the Apps Script webhook
 * configured in includes/config.php as GS_WEBHOOK_URL.
 */
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Site constants (mirrored from includes/header.php)
if (!defined('SITE_PHONE')) {
    define('SITE_PHONE', '+91 98765 43210');
    define('SITE_EMAIL', 'online.narender@gmail.com');
}

// Only handle POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Determine redirect destination early (modal submissions include a redirect_to field)
$redirect_to = 'contact.php';
if (!empty($_POST['redirect_to'])) {
    $candidate = trim($_POST['redirect_to']);
    // Only allow relative filenames in this directory (no slashes, no traversal)
    if (preg_match('/^[a-zA-Z0-9_\-\.]+\.php$/', $candidate) && strpos($candidate, '..') === false) {
        $redirect_to = $candidate;
    }
}

// Validate CSRF token
if (!isset($_POST['csrf_token'], $_SESSION['csrf_token'])
    || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    $_SESSION['form_status']  = 'error';
    $_SESSION['form_message'] = 'Invalid form submission. Please try again.';
    header('Location: ' . $redirect_to);
    exit;
}

// Collect & sanitize inputs
$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$phone   = trim(strip_tags($_POST['phone']   ?? ''));
$service = trim(strip_tags($_POST['service'] ?? ''));
$area    = trim(strip_tags($_POST['area']    ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

// Server-side validation
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please enter your full name (at least 2 characters).';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if (empty($phone) || !preg_match('/^[0-9+\-\s()]{7,15}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Please enter a message (at least 10 characters).';
}

if (!empty($errors)) {
    $_SESSION['form_status']  = 'error';
    $_SESSION['form_message'] = implode(' ', $errors);
    // Preserve submitted values so the form can be repopulated
    $_SESSION['form_data'] = [
        'name'    => $name,
        'email'   => $email,
        'phone'   => $phone,
        'service' => $service,
        'area'    => $area,
        'message' => $message,
    ];
    header('Location: ' . $redirect_to);
    exit;
}

// -------------------------------------------------------
// 1. Send email via PHPMailer (SMTP)
// -------------------------------------------------------
$mail = new PHPMailer(true);
$sent = false;

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress('online.narender@gmail.com', 'Ganga Boring');
    $mail->addReplyTo($email, $name);

    $mail->Subject = 'New Enquiry from Website – ' . $name;

    $plainBody  = "New Contact Form Submission\n";
    $plainBody .= "===========================\n\n";
    $plainBody .= "Name    : {$name}\n";
    $plainBody .= "Email   : {$email}\n";
    $plainBody .= "Phone   : {$phone}\n";
    $plainBody .= "Service : {$service}\n";
    $plainBody .= "Area    : {$area}\n\n";
    $plainBody .= "Message :\n{$message}\n\n";
    $plainBody .= "---\nSent from: " . ($_SERVER['HTTP_HOST'] ?? 'gangaboring.com') . "\n";
    $plainBody .= "Date     : " . date('Y-m-d H:i:s') . "\n";

    $mail->isHTML(true);
    $mail->Body    = nl2br(htmlspecialchars($plainBody));
    $mail->AltBody = $plainBody;

    $mail->send();
    $sent = true;
} catch (Exception $e) {
    // Email failed — log the error but continue so we can still save to Sheets
    error_log('PHPMailer error: ' . $mail->ErrorInfo);
}

// -------------------------------------------------------
// 2. Append lead to Google Sheets (optional)
// -------------------------------------------------------
$sheet_ok = false;
if (!empty(GS_WEBHOOK_URL)) {
    if (!function_exists('curl_init')) {
        error_log('Google Sheets webhook skipped: cURL extension is not available.');
    } else {
        $payload = json_encode([
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'service' => $service,
            'area'    => $area,
            'message' => $message,
        ]);

        $ch = curl_init(GS_WEBHOOK_URL);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_FOLLOWLOCATION => true,
        ]);
        $response  = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 200 && $response !== false) {
            $result   = json_decode($response, true);
            $sheet_ok = isset($result['status']) && $result['status'] === 'ok';
        }

        if (!$sheet_ok) {
            error_log('Google Sheets webhook error. HTTP ' . $http_code . ' | Response: ' . $response);
        }
    }
}

// -------------------------------------------------------
// 3. Set session flash message
// -------------------------------------------------------
// Email is the primary channel; Google Sheets is always optional/supplementary.
// Show success when email was delivered. If Sheets also fails, log it but do
// not change the user-facing outcome.
if ($sent) {
    $_SESSION['form_status']  = 'success';
    $_SESSION['form_message'] = 'Thank you, ' . htmlspecialchars($name) . '! Your enquiry has been received. We will contact you within 24 hours.';
} else {
    $_SESSION['form_status']  = 'error';
    $_SESSION['form_message'] = 'Sorry, we could not send your message right now. Please call us directly on ' . SITE_PHONE . '.';
}

// Regenerate CSRF token for next submission
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

header('Location: ' . $redirect_to);
exit;

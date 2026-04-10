<?php
/**
 * process-contact.php
 * Handles the contact form submission.
 * Returns to contact.php with a session status flag.
 */
session_start();

// Site constants (mirrored from includes/header.php)
if (!defined('SITE_PHONE')) {
    define('SITE_PHONE', '+91 98765 43210');
    define('SITE_EMAIL', 'info@shankarborewell.com');
}

// Only handle POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Validate CSRF token
if (!isset($_POST['csrf_token'], $_SESSION['csrf_token'])
    || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    $_SESSION['form_status']  = 'error';
    $_SESSION['form_message'] = 'Invalid form submission. Please try again.';
    header('Location: contact.php');
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
    header('Location: contact.php');
    exit;
}

// -------------------------------------------------------
// Email configuration — update these values as needed
// -------------------------------------------------------
$to      = 'info@shankarborewell.com';
$subject = 'New Enquiry from Website – ' . $name;

$body  = "New Contact Form Submission\n";
$body .= "===========================\n\n";
$body .= "Name    : {$name}\n";
$body .= "Email   : {$email}\n";
$body .= "Phone   : {$phone}\n";
$body .= "Service : {$service}\n";
$body .= "Area    : {$area}\n\n";
$body .= "Message :\n{$message}\n\n";
$body .= "---\nSent from: " . ($_SERVER['HTTP_HOST'] ?? 'shankarborewell.com') . "\n";
$body .= "Date     : " . date('Y-m-d H:i:s') . "\n";

$headers  = "From: noreply@shankarborewell.com\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . PHP_VERSION . "\r\n";

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    $_SESSION['form_status']  = 'success';
    $_SESSION['form_message'] = 'Thank you, ' . htmlspecialchars($name) . '! Your enquiry has been received. We will contact you within 24 hours.';
} else {
    $_SESSION['form_status']  = 'error';
    $_SESSION['form_message'] = 'Sorry, we could not send your message right now. Please call us directly on ' . SITE_PHONE . '.';
}

// Regenerate CSRF token for next submission
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

header('Location: contact.php');
exit;

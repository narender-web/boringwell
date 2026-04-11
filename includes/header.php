<?php
// Shared configuration
define('SITE_NAME',    'Ganga Boring');
define('SITE_PHONE',   '+91 98765 43210');
define('SITE_PHONE2',  '+91 98765 43211');
define('SITE_EMAIL',   'online.narender@gmail.com');
define('SITE_ADDRESS', 'No. 12, Main Road, Bangalore - 560001, Karnataka, India');
define('SITE_HOURS',   'Mon – Sat: 8:00 AM – 7:00 PM');

// Session + CSRF management (shared across all pages)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Capture and clear global form-status flash (set by process-contact.php)
$_GLOBAL_FORM_STATUS  = $_SESSION['form_status']  ?? null;
$_GLOBAL_FORM_MESSAGE = $_SESSION['form_message'] ?? null;
if ($_GLOBAL_FORM_STATUS !== null) {
    unset($_SESSION['form_status'], $_SESSION['form_message']);
    // Note: form_data is left in session for contact.php to use for form repopulation
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' – Professional Borewell Services'; ?></title>
    <meta name="description" content="<?php echo isset($page_desc) ? htmlspecialchars($page_desc) : 'Ganga Boring offers professional borewell drilling, repair, and pump installation services across Bangalore and Karnataka. 24/7 service, 20+ years experience.'; ?>">
    <meta name="keywords" content="borewell drilling, borewell repair, water borewell, pump installation, Bangalore borewell, Karnataka borewell">

    <!-- Open Graph -->
    <meta property="og:title"       content="<?php echo SITE_NAME; ?> – Professional Borewell Services">
    <meta property="og:description" content="Professional borewell drilling, repair &amp; pump installation.">
    <meta property="og:type"        content="website">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          referrerpolicy="no-referrer">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ===== Global Form Flash Notification ===== -->
<?php if ($_GLOBAL_FORM_STATUS !== null): ?>
<div id="flash-notification" class="flash-notification flash-<?php echo htmlspecialchars($_GLOBAL_FORM_STATUS); ?>">
    <i class="fas fa-<?php echo $_GLOBAL_FORM_STATUS === 'success' ? 'check-circle' : 'exclamation-circle'; ?>"></i>
    <?php echo htmlspecialchars($_GLOBAL_FORM_MESSAGE); ?>
    <button class="flash-close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
</div>
<?php endif; ?>

<!-- ===== Top Bar ===== -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <span><i class="fas fa-phone"></i><a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a></span>
            <span><i class="fas fa-envelope"></i><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></span>
            <span><i class="fas fa-clock"></i><?php echo SITE_HOURS; ?></span>
        </div>
        <div class="top-bar-right">
            <div class="social-links">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- ===== Header / Navigation ===== -->
<header class="main-header">
    <div class="container">
        <nav class="navbar">
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class="fas fa-water"></i></div>
                <div class="logo-text">
                    <span class="brand-name"><?php echo SITE_NAME; ?></span>
                    <span class="brand-tagline">Borewell Experts</span>
                </div>
            </a>

            <button class="hamburger" aria-label="Toggle menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="nav-cta"><a href="contact.php" class="btn btn-primary" data-modal="quote">Get Free Quote</a></li>
            </ul>
        </nav>
    </div>
</header>

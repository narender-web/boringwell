<?php
/**
 * includes/config.php
 *
 * Site-wide configuration for SMTP email and Google Sheets integration.
 * !! Never commit real credentials to version control !!
 *
 * HOW TO USE
 * ----------
 * Copy this file to includes/config.local.php and fill in your real values,
 * OR set the equivalent environment variables on your server and leave the
 * defaults below as-is (the getenv() calls will pick them up automatically).
 *
 * Supported env vars:
 *   SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS, SMTP_FROM, SMTP_FROM_NAME
 *   GS_WEBHOOK_URL
 */

// -----------------------------------------------------------------------
// SMTP settings  (Gmail example — for other providers change host/port)
// -----------------------------------------------------------------------
define('SMTP_HOST',      getenv('SMTP_HOST')      ?: 'smtp.gmail.com');
define('SMTP_PORT',      (int)(getenv('SMTP_PORT') ?: 587));          // 587 = TLS/STARTTLS
define('SMTP_USER',      getenv('SMTP_USER')      ?: 'YOUR_GMAIL@gmail.com');
define('SMTP_PASS',      getenv('SMTP_PASS')      ?: 'YOUR_APP_PASSWORD');
define('SMTP_FROM',      getenv('SMTP_FROM')      ?: 'YOUR_GMAIL@gmail.com');
define('SMTP_FROM_NAME', getenv('SMTP_FROM_NAME') ?: 'Ganga Boring Website');

// -----------------------------------------------------------------------
// Google Sheets – Apps Script web-app URL
// Deploy google-apps-script.js as a Google Apps Script web app and paste
// the deployment URL below (or set the GS_WEBHOOK_URL environment variable).
// Leave empty ('') to disable Google Sheets logging.
// -----------------------------------------------------------------------
define('GS_WEBHOOK_URL', getenv('GS_WEBHOOK_URL') ?: '');

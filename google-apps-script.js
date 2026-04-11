/**
 * google-apps-script.js
 *
 * Deploy this script as a Google Apps Script web app so that the PHP contact
 * form can append lead rows to your Google Sheet automatically.
 *
 * SETUP STEPS
 * -----------
 * 1. Open your Google Sheet:
 *    https://docs.google.com/spreadsheets/d/1hA9muJG68FEq7AE43C9RsEDIeA8Z_GfY15JtdLz1LZw/edit
 *
 * 2. Click  Extensions → Apps Script.
 *
 * 3. Delete any existing code in the editor and paste the entire contents of
 *    this file.
 *
 * 4. Click  Deploy → New deployment.
 *    - Type            : Web app
 *    - Execute as      : Me (your Google account)
 *    - Who has access  : Anyone   ← required so the PHP server can call it
 *
 * 5. Click  Deploy.  Authorise the permissions when prompted.
 *
 * 6. Copy the  Web app URL  (looks like
 *    https://script.google.com/macros/s/AKfy.../exec)
 *    and paste it into  includes/config.php  as the value of GS_WEBHOOK_URL,
 *    OR set it as the  GS_WEBHOOK_URL  environment variable on your server.
 *
 * NOTES
 * -----
 * - Every redeployment (after code changes) creates a new URL.  Update
 *   config.php whenever you redeploy.
 * - The script writes one row per submission.  The first row of the sheet is
 *   used as a header row; the script will create it automatically if empty.
 */

// ── Configuration ──────────────────────────────────────────────────────────
var SPREADSHEET_ID = '1hA9muJG68FEq7AE43C9RsEDIeA8Z_GfY15JtdLz1LZw';
var SHEET_NAME     = 'Leads';   // Change if you want a different tab name
// ───────────────────────────────────────────────────────────────────────────

/**
 * Handles HTTP POST requests sent by process-contact.php.
 * The PHP side posts JSON: { name, email, phone, service, area, message }
 */
function doPost(e) {
  try {
    var data   = JSON.parse(e.postData.contents);
    var result = appendLead(data);
    return ContentService
      .createTextOutput(JSON.stringify({ status: 'ok', row: result }))
      .setMimeType(ContentService.MimeType.JSON);
  } catch (err) {
    return ContentService
      .createTextOutput(JSON.stringify({ status: 'error', message: err.message }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}

/**
 * Also handles GET requests (useful for quick manual tests from a browser).
 */
function doGet(e) {
  return ContentService
    .createTextOutput(JSON.stringify({ status: 'ok', message: 'Webhook is live.' }))
    .setMimeType(ContentService.MimeType.JSON);
}

/**
 * Appends a new lead row to the sheet.
 * Creates the sheet and header row if they do not yet exist.
 *
 * @param {Object} data - Lead fields from the contact form.
 * @returns {number}    - The row number that was written.
 */
function appendLead(data) {
  var ss    = SpreadsheetApp.openById(SPREADSHEET_ID);
  var sheet = ss.getSheetByName(SHEET_NAME);

  // Create the sheet if it doesn't exist yet
  if (!sheet) {
    sheet = ss.insertSheet(SHEET_NAME);
  }

  // Add header row if the sheet is empty
  if (sheet.getLastRow() === 0) {
    sheet.appendRow([
      'Timestamp',
      'Name',
      'Email',
      'Phone',
      'Service',
      'Area',
      'Message'
    ]);

    // Style the header row
    var headerRange = sheet.getRange(1, 1, 1, 7);
    headerRange.setFontWeight('bold');
    headerRange.setBackground('#1565C0');
    headerRange.setFontColor('#FFFFFF');
    sheet.setFrozenRows(1);
  }

  var now = new Date();
  sheet.appendRow([
    Utilities.formatDate(now, Session.getScriptTimeZone(), 'yyyy-MM-dd HH:mm:ss'),
    data.name    || '',
    data.email   || '',
    data.phone   || '',
    data.service || '',
    data.area    || '',
    data.message || ''
  ]);

  return sheet.getLastRow();
}

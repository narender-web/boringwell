<?php
session_start();

// Generate CSRF token if one doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Pull status from session after form submission redirect
$form_status  = $_SESSION['form_status']  ?? null;
$form_message = $_SESSION['form_message'] ?? null;
unset($_SESSION['form_status'], $_SESSION['form_message']);

$page_title = 'Contact Us';
$page_desc  = 'Get in touch with Shankar Borewell for a free quote on borewell drilling, repair, or pump installation in Bangalore and Karnataka.';
include 'includes/header.php';
?>

<!-- Page Banner -->
<div class="page-banner">
    <h1>Contact Us</h1>
    <p class="breadcrumb"><a href="index.php">Home</a> &rsaquo; Contact Us</p>
</div>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            <!-- Info Column -->
            <div class="contact-info">
                <h3>Get In Touch</h3>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-content">
                        <strong>Phone</strong>
                        <a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a><br>
                        <a href="tel:<?php echo SITE_PHONE2; ?>"><?php echo SITE_PHONE2; ?></a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-content">
                        <strong>Email</strong>
                        <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-content">
                        <strong>Address</strong>
                        <span><?php echo SITE_ADDRESS; ?></span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                    <div class="info-content">
                        <strong>Working Hours</strong>
                        <span><?php echo SITE_HOURS; ?><br>Sunday: Emergency Only</span>
                    </div>
                </div>

                <!-- Quick Call CTA -->
                <a href="tel:<?php echo SITE_PHONE; ?>" class="btn btn-primary" style="margin-top:1rem;width:100%;text-align:center;">
                    <i class="fas fa-phone-alt"></i>&nbsp; Call Now for Free Quote
                </a>

                <!-- Map Placeholder -->
                <div style="margin-top:2rem;border-radius:12px;overflow:hidden;border:1px solid var(--border);">
                    <div style="background:var(--light-bg);height:220px;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:.75rem;color:var(--text-gray);">
                        <span style="font-size:2.5rem;">📍</span>
                        <p style="font-size:.9rem;">Map – Bangalore, Karnataka</p>
                        <a href="https://maps.google.com/?q=Bangalore,Karnataka" target="_blank" rel="noopener noreferrer"
                           style="font-size:.82rem;color:var(--primary);font-weight:600;">View on Google Maps →</a>
                    </div>
                </div>
            </div>

            <!-- Form Column -->
            <div class="contact-form-wrapper">
                <h3>Send Us An Enquiry</h3>

                <?php if ($form_status === 'success'): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo htmlspecialchars($form_message); ?>
                </div>
                <?php elseif ($form_status === 'error'): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($form_message); ?>
                </div>
                <?php endif; ?>

                <form id="contact-form" action="process-contact.php" method="post" novalidate>
                    <!-- CSRF Token -->
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name <span style="color:#C62828">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Your full name" required
                                   value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span style="color:#C62828">*</span></label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" required
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number <span style="color:#C62828">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210" required
                                   value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="service">Service Required</label>
                            <select id="service" name="service">
                                <option value="">-- Select Service --</option>
                                <?php
                                $services = ['Borewell Drilling','Borewell Repair','Borewell Cleaning','Pump Installation','Casing & Lining','Water Testing','Other / Not Sure'];
                                foreach ($services as $s): ?>
                                <option value="<?php echo htmlspecialchars($s); ?>"
                                    <?php echo (($_POST['service'] ?? '') === $s) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($s); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="area">Your Location / Area</label>
                        <input type="text" id="area" name="area" placeholder="e.g. Whitefield, Bangalore"
                               value="<?php echo htmlspecialchars($_POST['area'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="message">Message / Requirements <span style="color:#C62828">*</span></label>
                        <textarea id="message" name="message" rows="5"
                                  placeholder="Tell us about your requirements – depth needed, soil type, purpose of borewell, etc." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;padding:.875rem;font-size:1rem;">
                        <i class="fas fa-paper-plane"></i>&nbsp; Send Enquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- FAQ -->
<section style="padding:5rem 0;background:var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <span class="underline"></span>
        </div>

        <div style="max-width:800px;margin:0 auto;">
            <?php
            $faqs = [
                ['q'=>'How deep do you drill?',                   'a'=>'We drill up to 1000 feet depending on geology. Most residential borewells in Bangalore range from 200–600 feet.'],
                ['q'=>'How long does drilling take?',             'a'=>'A standard borewell can be drilled in 1–3 days depending on depth and soil conditions.'],
                ['q'=>'Do you provide a free site survey?',       'a'=>'Yes! We conduct a complimentary geophysical survey (resistivity test) before drilling to identify the best water-bearing zones.'],
                ['q'=>'What if the borewell is dry?',             'a'=>'If water is not found at the agreed depth, we do not charge for drilling beyond the agreed free-drilling limit. Terms are clearly stated in our contract.'],
                ['q'=>'Do you give any warranty?',                'a'=>'We provide a 1-year workmanship warranty on all drilling and installation work. Pump warranties are as per manufacturer terms.'],
                ['q'=>'Which areas do you service?',              'a'=>'We cover all of Bangalore and major towns across Karnataka including Mysuru, Tumkur, Mandya, Hassan, Kolar, and more.'],
            ];
            foreach ($faqs as $i => $faq): ?>
            <details style="background:var(--white);border-radius:8px;margin-bottom:1rem;border:1px solid var(--border);overflow:hidden;">
                <summary style="padding:1.1rem 1.25rem;font-weight:600;cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;">
                    <?php echo htmlspecialchars($faq['q']); ?>
                    <i class="fas fa-chevron-down" style="color:var(--primary);font-size:.85rem;"></i>
                </summary>
                <p style="padding:.25rem 1.25rem 1.25rem;color:var(--text-gray);font-size:.94rem;"><?php echo htmlspecialchars($faq['a']); ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

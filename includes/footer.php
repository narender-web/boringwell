<?php if (!defined('SITE_NAME')) include_once __DIR__ . '/header.php'; ?>
<!-- ===== Footer ===== -->
<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-brand">
                <div class="logo">
                    <div class="logo-icon"><i class="fas fa-water"></i></div>
                    <div class="logo-text">
                        <span class="brand-name"><?php echo SITE_NAME; ?></span>
                        <span class="brand-tagline">Borewell Experts</span>
                    </div>
                </div>
                <p>Your trusted partner for professional borewell drilling, repair, and pump installation services across Gurgaon and Haryana. Licensed, insured &amp; serving since 2004.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Home</a></li>
                    <li><a href="about.php"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>About Us</a></li>
                    <li><a href="services.php"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Services</a></li>
                    <li><a href="gallery.php"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Gallery</a></li>
                    <li><a href="contact.php"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Contact Us</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="services.php#drilling"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Borewell Drilling</a></li>
                    <li><a href="services.php#repair"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Borewell Repair</a></li>
                    <li><a href="services.php#cleaning"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Borewell Cleaning</a></li>
                    <li><a href="services.php#pump"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Pump Installation</a></li>
                    <li><a href="services.php#casing"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Casing &amp; Lining</a></li>
                    <li><a href="services.php#water-testing"><i class="fas fa-chevron-right" style="font-size:.7rem;margin-right:.4rem;color:var(--accent)"></i>Water Testing</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo SITE_ADDRESS; ?></span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span>
                            <a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a><br>
                            <a href="tel:<?php echo SITE_PHONE2; ?>"><?php echo SITE_PHONE2; ?></a>
                        </span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></span>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span><?php echo SITE_HOURS; ?><br>Sunday: Emergency Only</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:.5rem;">
            <p>&copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. All rights reserved.</p>
            <p>Designed &amp; Developed with ❤ | <a href="contact.php">Privacy Policy</a> | <a href="contact.php">Terms of Service</a></p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<button id="back-to-top" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>

<!-- ===== Get Quote Modal ===== -->
<div id="quote-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-title" hidden>
    <div class="modal-container">
        <button class="modal-close" id="modal-close-btn" aria-label="Close modal">&times;</button>
        <div class="modal-header">
            <div class="modal-icon"><i class="fas fa-clipboard-list"></i></div>
            <h2 id="modal-title">Get a Free Quote</h2>
            <p>Fill in your details and we'll get back to you within 24 hours.</p>
        </div>

        <div id="modal-alert" class="modal-alert" hidden></div>

        <form id="quote-modal-form" action="process-contact.php" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <input type="hidden" name="redirect_to" id="modal-redirect-to" value="">

            <div class="form-row">
                <div class="form-group">
                    <label for="modal-name">Full Name <span class="req">*</span></label>
                    <input type="text" id="modal-name" name="name" placeholder="Your full name" required>
                </div>
                <div class="form-group">
                    <label for="modal-email">Email Address <span class="req">*</span></label>
                    <input type="email" id="modal-email" name="email" placeholder="your@email.com" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal-phone">Phone Number <span class="req">*</span></label>
                    <input type="tel" id="modal-phone" name="phone" placeholder="+91 98765 43210" required>
                </div>
                <div class="form-group">
                    <label for="modal-service">Service Required</label>
                    <select id="modal-service" name="service">
                        <option value="">-- Select Service --</option>
                        <option value="Borewell Drilling">Borewell Drilling</option>
                        <option value="Borewell Repair">Borewell Repair</option>
                        <option value="Borewell Cleaning">Borewell Cleaning</option>
                        <option value="Pump Installation">Pump Installation</option>
                        <option value="Casing &amp; Lining">Casing &amp; Lining</option>
                        <option value="Water Testing">Water Testing</option>
                        <option value="Other / Not Sure">Other / Not Sure</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="modal-area">Your Location / Area</label>
                <input type="text" id="modal-area" name="area" placeholder="e.g. Sector 56, Gurgaon">
            </div>

            <div class="form-group">
                <label for="modal-message">Message / Requirements <span class="req">*</span></label>
                <textarea id="modal-message" name="message" rows="4"
                          placeholder="Tell us about your requirements – depth needed, purpose, etc." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary modal-submit-btn">
                <i class="fas fa-paper-plane"></i>&nbsp; Send Enquiry
            </button>
        </form>
    </div>
</div>

<!-- Script -->
<script src="js/script.js"></script>
</body>
</html>

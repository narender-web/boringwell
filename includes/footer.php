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
                <p>Your trusted partner for professional borewell drilling, repair, and pump installation services across Bangalore and Karnataka. Licensed, insured &amp; serving since 2004.</p>
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

<!-- Script -->
<script src="js/script.js"></script>
</body>
</html>

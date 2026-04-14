<?php
$page_title = 'Home';
$page_desc  = 'Ganga Boring – Professional borewell drilling, repair and pump installation in Gurgaon. 20+ years experience. Call now for a free quote.';
include 'includes/header.php';
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="badge"><i class="fas fa-award"></i> &nbsp;Trusted Since 2004</span>
            <h1>Expert <span>Borewell</span><br>Services You Can Trust</h1>
            <p>Professional borewell drilling, repair, and pump installation services across Gurgaon and Haryana. Licensed engineers, modern equipment, and guaranteed results.</p>
            <div class="hero-actions">
                <a href="contact.php" class="btn btn-primary" data-modal="quote"><i class="fas fa-phone-alt"></i>&nbsp; Get Free Quote</a>
                <a href="services.php" class="btn btn-outline"><i class="fas fa-list"></i>&nbsp; Our Services</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="number">500+</div>
                    <div class="label">Projects Done</div>
                </div>
                <div class="hero-stat">
                    <div class="number">20+</div>
                    <div class="label">Years Experience</div>
                </div>
                <div class="hero-stat">
                    <div class="number">98%</div>
                    <div class="label">Client Satisfaction</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-card">
                <div class="icon-ring">💧</div>
                <h3>Water Solutions</h3>
                <p>From drilling to pump fitting — we handle it all under one roof.</p>
                <div class="hero-card-features">
                    <span><i class="fas fa-check"></i> Drilling</span>
                    <span><i class="fas fa-check"></i> Tubewell</span>
                    <span><i class="fas fa-check"></i> Rotary</span>
                    <span><i class="fas fa-check"></i> Cleaning</span>
                    <span><i class="fas fa-check"></i> Rainwater</span>
                    <span><i class="fas fa-check"></i> Survey</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SERVICES OVERVIEW ===== -->
<section class="services-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
            <span class="underline"></span>
            <p>Comprehensive borewell solutions tailored to residential, commercial &amp; agricultural needs.</p>
        </div>

        <div class="services-grid">
            <?php
            $services = [
                ['icon'=>'fas fa-screwdriver-wrench', 'title'=>'Borewell Drilling',          'desc'=>'India being an agrarian country, our farmers depend mainly on groundwater for irrigation. We drill up to 1000 ft using modern rigs.'],
                ['icon'=>'fas fa-water',             'title'=>'Tubewell Drilling',          'desc'=>'Our firm is involved in providing qualitative Tubewell Drilling service to our prestigious clients.'],
                ['icon'=>'fas fa-cog',               'title'=>'Rotary Boring Method',       'desc'=>'This method can be successfully used for rock as well as unconsolidated formation for deeper borewells.'],
                ['icon'=>'fas fa-soap',              'title'=>'Flushing/Cleaning',          'desc'=>'We recommend clean/flush your bore well every 5 years to retain the yield &amp; quality of water using precision systems.'],
                ['icon'=>'fas fa-cloud-rain',        'title'=>'Modular Rainwater Harvesting','desc'=>'Advanced underground water storage using prefabricated, interlocking modules with 95% void space for efficient storage and recharge.'],
                ['icon'=>'fas fa-flask',             'title'=>'Hydrological Survey',        'desc'=>'Scientific, field-based assessment using geophysical techniques, water table mapping, and chemical analysis for groundwater management.'],
            ];
            foreach ($services as $s): ?>
            <div class="service-card">
                <div class="service-icon"><i class="<?php echo htmlspecialchars($s['icon']); ?>"></i></div>
                <h3><?php echo htmlspecialchars($s['title']); ?></h3>
                <p><?php echo htmlspecialchars($s['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-3">
            <a href="services.php" class="btn btn-primary">View All Services <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ===== COUNTERS ===== -->
<section class="counters-section">
    <div class="container">
        <div class="counters-grid">
            <div class="counter-item">
                <span class="counter-number" data-target="500" data-suffix="+">500+</span>
                <p>Borewells Drilled</p>
            </div>
            <div class="counter-item">
                <span class="counter-number" data-target="20" data-suffix="+">20+</span>
                <p>Years Experience</p>
            </div>
            <div class="counter-item">
                <span class="counter-number" data-target="350" data-suffix="+">350+</span>
                <p>Pumps Installed</p>
            </div>
            <div class="counter-item">
                <span class="counter-number" data-target="98" data-suffix="%">98%</span>
                <p>Satisfaction Rate</p>
            </div>
            <div class="counter-item">
                <span class="counter-number" data-target="50" data-suffix="+">50+</span>
                <p>Areas Covered</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== ABOUT PREVIEW ===== -->
<section class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <img src="https://github.com/user-attachments/assets/eb70646c-925b-4625-a0a9-6b2acb8fc9ef"
                     alt="Borewell drilling site in Gurgaon, Haryana"
                     class="about-img-main"
                     loading="lazy">
                <div class="experience-badge">
                    <div class="years">20+</div>
                    <div class="badge-text">Years of<br>Excellence</div>
                </div>
            </div>

            <div class="about-content">
                <div class="section-title" style="text-align:left;margin-bottom:1.5rem;">
                    <h2>About Ganga Boring</h2>
                    <span class="underline" style="margin:0.75rem 0 0;"></span>
                </div>
                <p>Since 2004, <strong>Ganga Boring</strong> has been providing reliable, efficient, and affordable borewell solutions to thousands of satisfied customers across Gurgaon and Haryana.</p>
                <p>Our team of licensed hydrogeologists and experienced drilling crews use modern equipment to ensure maximum success rates and water yield for every project.</p>

                <div class="about-features">
                    <?php
                    $features = [
                        ['title'=>'Licensed & Certified',  'desc'=>'Fully licensed by Haryana CGWB and insured for all operations.'],
                        ['title'=>'Modern Equipment',      'desc'=>'DTH and rotary drilling rigs capable of drilling up to 1000 ft.'],
                        ['title'=>'Free Site Survey',      'desc'=>'Complimentary geophysical survey before drilling to maximize success.'],
                        ['title'=>'24/7 Support',          'desc'=>'Round-the-clock emergency repair and support for all clients.'],
                    ];
                    foreach ($features as $f): ?>
                    <div class="about-feature">
                        <div class="check"><i class="fas fa-check"></i></div>
                        <div>
                            <strong><?php echo htmlspecialchars($f['title']); ?></strong>
                            <span><?php echo htmlspecialchars($f['desc']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="about.php" class="btn btn-primary mt-2">Read More About Us <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US ===== -->
<section class="why-section">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Us?</h2>
            <span class="underline"></span>
            <p>We combine two decades of expertise with cutting-edge technology to deliver water solutions that last.</p>
        </div>

        <div class="why-grid">
            <?php
            $why = [
                ['icon'=>'🔬', 'title'=>'Scientific Approach',   'desc'=>'Geophysical survey ensures we drill at the right spot, reducing dry bore risk.'],
                ['icon'=>'⚡', 'title'=>'Fast Turnaround',        'desc'=>'Most borewells completed within 1–3 days. Minimal site disruption.'],
                ['icon'=>'💰', 'title'=>'Transparent Pricing',   'desc'=>'No hidden costs. Detailed quote before work begins.'],
                ['icon'=>'🛡️', 'title'=>'Workmanship Warranty', 'desc'=>'1-year warranty on all drilling and installation work.'],
                ['icon'=>'🚚', 'title'=>'Statewide Coverage',    'desc'=>'Operating across Haryana — urban, suburban &amp; rural areas.'],
                ['icon'=>'📞', 'title'=>'24/7 Emergency',        'desc'=>'Emergency repair team available round the clock, every day of the year.'],
            ];
            foreach ($why as $w): ?>
            <div class="why-card">
                <span class="why-icon"><?php echo $w['icon']; ?></span>
                <h3><?php echo htmlspecialchars($w['title']); ?></h3>
                <p><?php echo $w['desc']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-title">
            <h2>What Our Clients Say</h2>
            <span class="underline"></span>
            <p>Trusted by hundreds of homeowners, farmers, and businesses across Haryana.</p>
        </div>

        <div class="testimonials-grid">
            <?php
            $testimonials = [
                ['text'=>'Ganga Boring drilled our borewell in just 2 days and we got excellent water yield. Their team was professional and clean. Highly recommended!', 'name'=>'Ramesh Kumar', 'loc'=>'Sector 56, Gurgaon',    'init'=>'RK', 'cls'=>''],
                ['text'=>'Our old borewell had gone dry. Ganga Boring cleaned and restored it at a fraction of re-drilling cost. Excellent service and fair pricing.', 'name'=>'Sunita Patel',  'loc'=>'Faridabad, Haryana',  'init'=>'SP', 'cls'=>'bg-accent'],
                ['text'=>'Used their pump installation service. The team arrived on time, work was done neatly, and they explained everything clearly. Great experience!', 'name'=>'Gopal Reddy',  'loc'=>'Manesar, Haryana',    'init'=>'GR', 'cls'=>'bg-green'],
            ];
            foreach ($testimonials as $t): ?>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"<?php echo htmlspecialchars($t['text']); ?>"</p>
                <div class="testimonial-author">
                    <div class="author-avatar <?php echo $t['cls']; ?>"><?php echo htmlspecialchars($t['init']); ?></div>
                    <div class="author-info">
                        <strong><?php echo htmlspecialchars($t['name']); ?></strong>
                        <span><?php echo htmlspecialchars($t['loc']); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== SERVICE AREAS ===== -->
<section class="areas-section">
    <div class="container">
        <div class="section-title">
            <h2>Areas We Serve</h2>
            <span class="underline"></span>
            <p>Providing borewell services across the NCR region and surrounding districts of Haryana.</p>
        </div>

        <div class="areas-grid">
            <?php
            $areas = ['New Delhi','Noida','Greater Noida','Gurgaon (Gurugram)','Faridabad','Ghaziabad','Indirapuram','Vasundhara','Dwarka','Rohini','Sonipat','Panipat','Bahadurgarh','Manesar','Ballabhgarh','Palwal','Meerut','Rewari'];
            foreach ($areas as $a): ?>
            <div class="area-item"><i class="fas fa-map-marker-alt"></i><?php echo htmlspecialchars($a); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CLIENTS ===== -->
<section class="clients-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Trusted Clients</h2>
            <span class="underline"></span>
            <p>Proud to serve government bodies, industries, housing societies, and agricultural organisations across Haryana &amp; NCR.</p>
        </div>
    </div>
    <div class="clients-marquee-wrapper" aria-label="Our clients">
        <div class="clients-track">
            <?php
            $clients = [
                ['img'=>'https://github.com/user-attachments/assets/324377e1-3737-4038-bdf9-8146a5c210a0', 'name'=>'JBM Group'],
                ['img'=>'https://github.com/user-attachments/assets/233a1501-f6b1-4b3b-9f5f-69c7429fe507', 'name'=>'Gulf Petrochem'],
                ['img'=>'https://github.com/user-attachments/assets/264b127a-5c0f-4c6f-9a89-fadba4afad1d', 'name'=>'Bry-Air'],
                ['img'=>'https://github.com/user-attachments/assets/c7c0a0a3-8461-4a86-aef6-e9ddcab33dca', 'name'=>'Hindalco'],
                ['img'=>'https://github.com/user-attachments/assets/9c576062-b85c-48a1-9e3d-e23eb60a6b2e', 'name'=>'The Heritage School'],
                ['img'=>'https://github.com/user-attachments/assets/48e3dd34-3fb2-4a79-ad0b-1da571f61ee8', 'name'=>'Hitachi'],
                ['img'=>'https://github.com/user-attachments/assets/6066d595-3453-42c3-b4a2-67138403362c', 'name'=>'Signature Global'],
            ];
            // Duplicate for seamless loop
            $loop = array_merge($clients, $clients);
            foreach ($loop as $c): ?>
            <div class="client-logo-card">
                <img src="<?php echo htmlspecialchars($c['img']); ?>" alt="<?php echo htmlspecialchars($c['name']); ?>" loading="lazy">
                <span><?php echo htmlspecialchars($c['name']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CTA STRIP ===== -->
<section class="cta-section" style="background:var(--accent);padding:3rem 0;">
    <div class="container text-center">
        <h2 style="color:#fff;margin-bottom:.75rem;">Need a Borewell? Let's Talk!</h2>
        <p style="color:rgba(255,255,255,.9);margin-bottom:1.75rem;max-width:550px;margin-left:auto;margin-right:auto;">Our team is ready to help. Contact us today for a free site survey and competitive quote.</p>
        <a href="tel:<?php echo SITE_PHONE; ?>" class="btn btn-outline" style="margin-right:1rem;"><i class="fas fa-phone-alt"></i>&nbsp; Call Now</a>
        <a href="contact.php" class="btn" style="background:#fff;color:var(--accent);font-weight:700;" data-modal="quote"><i class="fas fa-envelope"></i>&nbsp; Send Enquiry</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

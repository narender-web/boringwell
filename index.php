<?php
$page_title = 'Home';
$page_desc  = 'Shankar Borewell – Professional borewell drilling, repair and pump installation in Bangalore. 20+ years experience. Call now for a free quote.';
include 'includes/header.php';
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="badge"><i class="fas fa-award"></i> &nbsp;Trusted Since 2004</span>
            <h1>Expert <span>Borewell</span><br>Services You Can Trust</h1>
            <p>Professional borewell drilling, repair, and pump installation services across Bangalore and Karnataka. Licensed engineers, modern equipment, and guaranteed results.</p>
            <div class="hero-actions">
                <a href="contact.php" class="btn btn-primary"><i class="fas fa-phone-alt"></i>&nbsp; Get Free Quote</a>
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
                    <span><i class="fas fa-check"></i> Repair</span>
                    <span><i class="fas fa-check"></i> Cleaning</span>
                    <span><i class="fas fa-check"></i> Pumps</span>
                    <span><i class="fas fa-check"></i> Casing</span>
                    <span><i class="fas fa-check"></i> Testing</span>
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
                ['icon'=>'fas fa-drill',            'title'=>'Borewell Drilling',     'desc'=>'State-of-the-art rotary drilling rigs for new borewells with precise depth and diameter.'],
                ['icon'=>'fas fa-tools',             'title'=>'Borewell Repair',       'desc'=>'Expert diagnosis and repair of damaged or low-yield borewells, restoring them to peak performance.'],
                ['icon'=>'fas fa-soap',              'title'=>'Borewell Cleaning',     'desc'=>'High-pressure flushing and chemical treatment to remove sediment and increase water flow.'],
                ['icon'=>'fas fa-pump-medical',      'title'=>'Pump Installation',     'desc'=>'Supply and installation of submersible and jet pumps from trusted brands with warranty.'],
                ['icon'=>'fas fa-layer-group',       'title'=>'Casing & Lining',       'desc'=>'PVC and steel casing to protect borewell walls from collapse and contamination.'],
                ['icon'=>'fas fa-flask',             'title'=>'Water Testing',         'desc'=>'Laboratory-standard water quality analysis for potability, hardness, and contamination checks.'],
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
                <div class="about-img-placeholder">
                    <span>🏗️</span>
                    <p>Borewell Drilling Site</p>
                </div>
                <div class="experience-badge">
                    <div class="years">20+</div>
                    <div class="badge-text">Years of<br>Excellence</div>
                </div>
            </div>

            <div class="about-content">
                <div class="section-title" style="text-align:left;margin-bottom:1.5rem;">
                    <h2>About Shankar Borewell</h2>
                    <span class="underline" style="margin:0.75rem 0 0;"></span>
                </div>
                <p>Since 2004, <strong>Shankar Borewell</strong> has been providing reliable, efficient, and affordable borewell solutions to thousands of satisfied customers across Bangalore and Karnataka.</p>
                <p>Our team of licensed hydrogeologists and experienced drilling crews use modern equipment to ensure maximum success rates and water yield for every project.</p>

                <div class="about-features">
                    <?php
                    $features = [
                        ['title'=>'Licensed & Certified',  'desc'=>'Fully licensed by Karnataka CGWB and insured for all operations.'],
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
                ['icon'=>'🚚', 'title'=>'Statewide Coverage',    'desc'=>'Operating across Karnataka — urban, suburban &amp; rural areas.'],
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
            <p>Trusted by hundreds of homeowners, farmers, and businesses across Karnataka.</p>
        </div>

        <div class="testimonials-grid">
            <?php
            $testimonials = [
                ['text'=>'Shankar Borewell drilled our borewell in just 2 days and we got excellent water yield. Their team was professional and clean. Highly recommended!', 'name'=>'Ramesh Kumar', 'loc'=>'Whitefield, Bangalore', 'init'=>'RK', 'cls'=>''],
                ['text'=>'Our old borewell had gone dry. Shankar Borewell cleaned and restored it at a fraction of re-drilling cost. Excellent service and fair pricing.', 'name'=>'Sunita Patel',  'loc'=>'Mysuru, Karnataka',    'init'=>'SP', 'cls'=>'bg-accent'],
                ['text'=>'Used their pump installation service. The team arrived on time, work was done neatly, and they explained everything clearly. Great experience!', 'name'=>'Gopal Reddy',  'loc'=>'Tumkur, Karnataka',    'init'=>'GR', 'cls'=>'bg-green'],
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
            <p>Providing borewell services across Bangalore and major districts of Karnataka.</p>
        </div>

        <div class="areas-grid">
            <?php
            $areas = ['Whitefield','Koramangala','Marathahalli','Electronic City','Jayanagar','JP Nagar','Hebbal','Yelahanka','Mysuru','Tumkur','Mandya','Hassan','Ramanagara','Kolar','Chikkaballapur','Doddaballapur','Nelamangala','Devanahalli'];
            foreach ($areas as $a): ?>
            <div class="area-item"><i class="fas fa-map-marker-alt"></i><?php echo htmlspecialchars($a); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CTA STRIP ===== -->
<section style="background:var(--accent);padding:3rem 0;">
    <div class="container text-center">
        <h2 style="color:#fff;margin-bottom:.75rem;">Need a Borewell? Let's Talk!</h2>
        <p style="color:rgba(255,255,255,.9);margin-bottom:1.75rem;max-width:550px;margin-left:auto;margin-right:auto;">Our team is ready to help. Contact us today for a free site survey and competitive quote.</p>
        <a href="tel:<?php echo SITE_PHONE; ?>" class="btn btn-outline" style="margin-right:1rem;"><i class="fas fa-phone-alt"></i>&nbsp; Call Now</a>
        <a href="contact.php" class="btn" style="background:#fff;color:var(--accent);font-weight:700;"><i class="fas fa-envelope"></i>&nbsp; Send Enquiry</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

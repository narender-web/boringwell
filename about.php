<?php
$page_title = 'About Us';
$page_desc  = 'Learn about Shankar Borewell – 20+ years of professional borewell drilling and water solutions in Bangalore and Karnataka.';
include 'includes/header.php';
?>

<!-- Page Banner -->
<div class="page-banner">
    <h1>About Us</h1>
    <p class="breadcrumb"><a href="index.php">Home</a> &rsaquo; About Us</p>
</div>

<!-- About Main -->
<section class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <div class="about-img-placeholder">
                    <span>🏗️</span>
                    <p>20+ Years of Excellence</p>
                </div>
                <div class="experience-badge">
                    <div class="years">20+</div>
                    <div class="badge-text">Years of<br>Excellence</div>
                </div>
            </div>

            <div class="about-content">
                <div class="section-title" style="text-align:left;margin-bottom:1.5rem;">
                    <h2>Who We Are</h2>
                    <span class="underline" style="margin:.75rem 0 0;"></span>
                </div>

                <p>Founded in 2004 by <strong>Mr. Shankar Rao</strong>, Shankar Borewell began as a small one-rig operation in Bangalore and has grown into one of Karnataka's most trusted borewell service providers.</p>

                <p>We specialize in new borewell drilling, borewell repair, borewell cleaning, submersible pump installation, PVC casing, and water quality testing. Our licensed team of hydrogeologists and experienced drill operators serves residential, commercial, industrial, and agricultural clients.</p>

                <p>Every project begins with a free geophysical survey to identify the most productive water-bearing zones, maximizing success rates and water yield — saving our clients time and money.</p>

                <div class="about-features">
                    <?php
                    $features = [
                        ['title'=>'Licensed & Certified',        'desc'=>'Registered with Karnataka CGWB, BWSSB approved contractor.'],
                        ['title'=>'Modern Drilling Equipment',   'desc'=>'DTH air rotary and mud rotary rigs for all soil conditions.'],
                        ['title'=>'Experienced Team',            'desc'=>'25+ trained professionals with a combined 100+ years experience.'],
                        ['title'=>'ISO Quality Standards',       'desc'=>'Work carried out to IS 14220 borewell construction standards.'],
                        ['title'=>'Eco-Friendly Practices',      'desc'=>'Responsible water management and minimal environmental impact.'],
                        ['title'=>'After-Service Support',       'desc'=>'Annual maintenance contracts and 24/7 emergency support.'],
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
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section style="background:var(--light-bg);padding:5rem 0;">
    <div class="container">
        <div class="section-title">
            <h2>Our Mission &amp; Vision</h2>
            <span class="underline"></span>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2rem;">
            <?php
            $mv = [
                ['icon'=>'🎯','title'=>'Our Mission', 'text'=>'To provide affordable, reliable, and scientifically sound borewell solutions that ensure every family, farm, and business in Karnataka has access to clean groundwater.'],
                ['icon'=>'🌟','title'=>'Our Vision',  'text'=>'To be the most trusted name in groundwater development in South India, combining modern technology with ethical business practices.'],
                ['icon'=>'💎','title'=>'Our Values',  'text'=>'Integrity in pricing, excellence in workmanship, respect for the environment, and dedication to customer satisfaction guide every project we undertake.'],
            ];
            foreach ($mv as $item): ?>
            <div class="service-card" style="text-align:center;">
                <div style="font-size:3rem;margin-bottom:1rem;"><?php echo $item['icon']; ?></div>
                <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                <p><?php echo htmlspecialchars($item['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team -->
<section style="padding:5rem 0;background:var(--white);">
    <div class="container">
        <div class="section-title">
            <h2>Meet Our Team</h2>
            <span class="underline"></span>
            <p>Our skilled professionals bring expertise, dedication, and passion to every project.</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1.75rem;">
            <?php
            $team = [
                ['name'=>'Shankar Rao',    'role'=>'Founder & CEO',            'icon'=>'👨‍💼'],
                ['name'=>'Vijay Kumar',    'role'=>'Lead Hydrogeologist',       'icon'=>'🔬'],
                ['name'=>'Raju Naik',      'role'=>'Senior Drill Operator',     'icon'=>'⚙️'],
                ['name'=>'Priya Sharma',   'role'=>'Customer Relations Manager','icon'=>'👩‍💼'],
            ];
            foreach ($team as $member): ?>
            <div style="background:var(--light-bg);border-radius:12px;padding:2rem 1.5rem;text-align:center;">
                <div style="font-size:3.5rem;margin-bottom:.75rem;"><?php echo $member['icon']; ?></div>
                <h3 style="font-size:1.05rem;margin-bottom:.3rem;"><?php echo htmlspecialchars($member['name']); ?></h3>
                <span style="font-size:.85rem;color:var(--text-gray);"><?php echo htmlspecialchars($member['role']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Counters -->
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
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

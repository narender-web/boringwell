<?php
$page_title = 'Our Services';
$page_desc  = 'Explore Jitu Borwell\'s full range of services: drilling, repair, cleaning, pump installation, casing, and water testing in Bangalore and Karnataka.';
include 'includes/header.php';
?>

<!-- Page Banner -->
<div class="page-banner">
    <h1>Our Services</h1>
    <p class="breadcrumb"><a href="index.php">Home</a> &rsaquo; Services</p>
</div>

<!-- Services Intro -->
<section style="padding:4rem 0;background:var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2>Comprehensive Borewell Solutions</h2>
            <span class="underline"></span>
            <p>From initial drilling to long-term maintenance, we offer end-to-end groundwater services for every need and budget.</p>
        </div>
    </div>
</section>

<?php
$services = [
    [
        'id'      => 'drilling',
        'icon'    => '🔩',
        'title'   => 'Borewell Drilling',
        'tagline' => 'New borewell construction for residential, commercial &amp; agricultural use',
        'desc'    => 'We deploy advanced DTH (Down-the-Hole) hammer and rotary drilling rigs capable of drilling up to 1000 ft in various geological formations. Every project begins with a free geophysical survey to pinpoint optimal water-bearing zones.',
        'features'=> ['Free geophysical survey','Drilling up to 1000 ft depth','PVC/Steel pipe casing','Yield test on completion','Site cleanup included','IS 14220 standard compliance'],
    ],
    [
        'id'      => 'repair',
        'icon'    => '🔧',
        'title'   => 'Borewell Repair',
        'tagline' => 'Restore failing borewells to peak performance',
        'desc'    => 'A failing or dry borewell is often repairable at far less cost than re-drilling. Our diagnostic team uses downhole cameras to assess damage, casing collapse, sand infiltration, and other issues before recommending the best repair strategy.',
        'features'=> ['Downhole CCTV inspection','Casing collapse repair','Sand/silt removal','Screen repair or replacement','Yield improvement techniques','Repair warranty provided'],
    ],
    [
        'id'      => 'cleaning',
        'icon'    => '🫧',
        'title'   => 'Borewell Cleaning',
        'tagline' => 'Increase water yield with professional cleaning',
        'desc'    => 'Over time, borewells accumulate biofouling, iron bacteria, and mineral deposits that reduce yield. Our high-pressure air and water jetting, combined with safe chemical treatment, can restore up to 80% of lost yield.',
        'features'=> ['Air & water jetting','Chemical bio-treatment','Iron bacteria removal','Sediment flushing','Pre & post yield testing','Safe for drinking water'],
    ],
    [
        'id'      => 'pump',
        'icon'    => '⚙️',
        'title'   => 'Pump Installation',
        'tagline' => 'Expert supply & installation of submersible and jet pumps',
        'desc'    => 'We supply and install submersible and jet pumps from leading brands including Grundfos, Kirloskar, CRI, and Texmo. Our electricians handle complete wiring, control panels, and starter boxes.',
        'features'=> ['Grundfos / Kirloskar / CRI pumps','Complete electrical wiring','Control panel & starters','Pump motor rewinding','Annual maintenance contracts','Brand warranty support'],
    ],
    [
        'id'      => 'casing',
        'icon'    => '🏗️',
        'title'   => 'Casing & Lining',
        'tagline' => 'Protect your borewell with quality casing and lining',
        'desc'    => 'Proper casing prevents borewell collapse and groundwater contamination. We supply and install IS-certified PVC screen casing, HDPE casing, and MS steel casing for all soil types and depths.',
        'features'=> ['IS-certified PVC casing','HDPE & MS steel casing','Perforated screen sections','Gravel packing','Surface seal / headworks','Long-life corrosion protection'],
    ],
    [
        'id'      => 'water-testing',
        'icon'    => '🔬',
        'title'   => 'Water Testing',
        'tagline' => 'Know the quality of water from your borewell',
        'desc'    => 'Safe drinking water starts with proper testing. We offer field and laboratory-based water quality analysis covering physical, chemical, and biological parameters, with detailed reports and treatment recommendations.',
        'features'=> ['pH, TDS & hardness testing','Bacterial contamination check','Heavy metal analysis','Fluoride & nitrate levels','Detailed lab report','Water treatment advice'],
    ],
];

foreach ($services as $idx => $svc):
    $flip = ($idx % 2 === 1);
    $bg   = $flip ? 'var(--white)' : 'var(--light-bg)';
?>
<section id="<?php echo $svc['id']; ?>" style="padding:5rem 0;background:<?php echo $bg; ?>;">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:3.5rem;align-items:center;<?php echo $flip ? 'direction:rtl' : ''; ?>">

            <!-- Visual -->
            <div style="<?php echo $flip ? 'direction:ltr' : ''; ?>">
                <div style="width:100%;height:300px;background:linear-gradient(135deg,var(--primary) 0%,var(--primary-dark) 100%);border-radius:16px;display:flex;flex-direction:column;align-items:center;justify-content:center;color:var(--white);font-size:5rem;gap:.75rem;">
                    <?php echo $svc['icon']; ?>
                    <span style="font-size:1rem;opacity:.85;"><?php echo htmlspecialchars($svc['title']); ?></span>
                </div>
            </div>

            <!-- Content -->
            <div style="<?php echo $flip ? 'direction:ltr' : ''; ?>">
                <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;color:var(--accent);margin-bottom:.5rem;">Our Services</div>
                <h2 style="color:var(--primary-dark);margin-bottom:.5rem;"><?php echo htmlspecialchars($svc['title']); ?></h2>
                <p style="color:var(--accent);font-weight:600;margin-bottom:1rem;"><?php echo $svc['tagline']; ?></p>
                <p style="color:var(--text-gray);margin-bottom:1.5rem;"><?php echo htmlspecialchars($svc['desc']); ?></p>

                <ul style="display:grid;grid-template-columns:1fr 1fr;gap:.65rem;margin-bottom:1.75rem;">
                    <?php foreach ($svc['features'] as $feat): ?>
                    <li style="display:flex;align-items:center;gap:.5rem;font-size:.92rem;">
                        <i class="fas fa-check-circle" style="color:var(--primary);"></i>
                        <?php echo htmlspecialchars($feat); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <a href="contact.php" class="btn btn-primary" data-modal="quote">Get a Quote <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<!-- CTA -->
<section style="background:var(--primary-dark);padding:4rem 0;text-align:center;">
    <div class="container">
        <h2 style="color:var(--white);margin-bottom:.75rem;">Not Sure Which Service You Need?</h2>
        <p style="color:rgba(255,255,255,.8);margin-bottom:1.75rem;max-width:500px;margin-left:auto;margin-right:auto;">Our experts will assess your situation and recommend the right solution. Contact us for a free consultation.</p>
        <a href="contact.php" class="btn btn-primary" style="margin-right:1rem;"><i class="fas fa-envelope"></i>&nbsp; Contact Us</a>
        <a href="tel:<?php echo SITE_PHONE; ?>" class="btn btn-outline"><i class="fas fa-phone-alt"></i>&nbsp; <?php echo SITE_PHONE; ?></a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

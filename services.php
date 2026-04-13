<?php
$page_title = 'Our Services';
$page_desc  = 'Explore Ganga Boring Co.\'s full range of services: borewell drilling, tubewell drilling, rotary boring, flushing/cleaning, modular rainwater harvesting, and hydrological survey in Haryana.';
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
        'img'     => 'https://github.com/user-attachments/assets/eb70646c-925b-4625-a0a9-6b2acb8fc9ef',
        'alt'     => 'Borewell drilling rig at a site in Haryana',
        'title'   => 'Borewell Drilling',
        'tagline' => 'Expert borewell construction for residential, commercial &amp; agricultural use',
        'desc'    => 'India being an agrarian country, our farmers depend mainly on groundwater for irrigation. We deploy advanced DTH (Down-the-Hole) hammer and rotary drilling rigs capable of drilling up to 1000 ft in various geological formations. Every project begins with a free geophysical survey to pinpoint optimal water-bearing zones.',
        'features'=> ['Free geophysical survey','Drilling up to 1000 ft depth','PVC/Steel pipe casing','Yield test on completion','Site cleanup included','IS 14220 standard compliance'],
    ],
    [
        'id'      => 'tubewell',
        'img'     => 'https://github.com/user-attachments/assets/f4bf1658-f820-43bd-8824-420cc7118f38',
        'alt'     => 'Tubewell drilling in progress',
        'title'   => 'Tubewell Drilling',
        'tagline' => 'Qualitative tubewell drilling service for all clients',
        'desc'    => 'Our firm is involved in providing qualitative Tubewell Drilling service to our prestigious clients. Tubewells are drilled using modern equipment to achieve precise depth and optimal water yield, ensuring reliable and long-lasting water supply for agricultural, industrial, and domestic needs.',
        'features'=> ['Modern drilling equipment','High water yield','Custom depth drilling','PVC screen casing','Yield test on completion','Timely project delivery'],
    ],
    [
        'id'      => 'rotary',
        'img'     => 'https://github.com/user-attachments/assets/a122ed5c-6396-4d5b-be30-9b6872809f22',
        'alt'     => 'Rotary boring method at work',
        'title'   => 'Rotary Boring Method',
        'tagline' => 'Versatile drilling method for rock and unconsolidated formations',
        'desc'    => 'This method is generally called rotary boring method. This method can be successfully used for rock as well as unconsolidated formation. It is ideal for deeper borewells and complex geological conditions, offering precise and efficient drilling with minimal site disruption.',
        'features'=> ['Suitable for rock formations','Works in unconsolidated soil','Precision drilling','Greater depth capability','Minimal site disruption','Expert crew operation'],
    ],
    [
        'id'      => 'cleaning',
        'img'     => 'https://github.com/user-attachments/assets/185aaba1-7f1a-4019-8697-2e3aa4ad659f',
        'alt'     => 'High-pressure borewell flushing and cleaning',
        'title'   => 'Flushing/Cleaning',
        'tagline' => 'Professional flushing and cleaning to maintain yield & water quality',
        'desc'    => 'We are one of the leading manufacturers of PRECISION cleaning systems, including flushing cleaners. We recommend clean/flush your bore well on every 5 years to retain the yield & quality of water. Our high-pressure jetting combined with safe chemical treatment restores optimal flow and removes biofouling and mineral deposits.',
        'features'=> ['High-pressure air & water jetting','Chemical bio-treatment','Iron bacteria removal','Sediment flushing','Pre & post yield testing','Safe for drinking water'],
    ],
    [
        'id'      => 'rainwater',
        'img'     => 'https://github.com/user-attachments/assets/aa2f3937-2b0e-4fc7-977e-f80f61af27da',
        'alt'     => 'Modular rainwater harvesting system installation',
        'title'   => 'Modular Rainwater Harvesting',
        'tagline' => 'Advanced underground water storage and groundwater recharge systems',
        'desc'    => 'Modular rainwater harvesting is an advanced, underground water storage system using prefabricated, interlocking plastic modules (often 95% void space) for efficient rainwater storage, filtration, and groundwater recharge. These systems offer flexible, high-capacity, and durable storage (supporting vehicle traffic) for residential and industrial areas, often featuring quick installation, self-cleaning filters, and eco-friendly, recycled materials.',
        'features'=> ['95% void space modules','Supports vehicle traffic','Quick installation','Self-cleaning filters','Eco-friendly & recycled','Residential & industrial use'],
    ],
    [
        'id'      => 'survey',
        'img'     => 'https://github.com/user-attachments/assets/eab37cf0-7d2c-41fa-bc4f-0b1021a330a4',
        'alt'     => 'Hydrological survey and water resource assessment',
        'title'   => 'Hydrological Survey',
        'tagline' => 'Scientific assessment of groundwater potential, quality, and flow dynamics',
        'desc'    => 'A scientific, field-based assessment to identify, analyze, and manage water resources, focusing on groundwater potential, quality, and flow dynamics. These studies utilize geophysical techniques, water table mapping, and chemical analysis for projects like well installation, environmental assessment, and water source management. 100% Assured Success — delivering high-level customer satisfaction with quality output and real value for money.',
        'features'=> ['Geophysical techniques','Water table mapping','Chemical analysis','Well installation planning','Environmental assessment','Detailed survey reports'],
    ],
];

foreach ($services as $idx => $svc):
    $flip = ($idx % 2 === 1);
    $bg   = $flip ? 'var(--white)' : 'var(--light-bg)';
?>
<section id="<?php echo $svc['id']; ?>" style="padding:5rem 0;background:<?php echo $bg; ?>;">
    <div class="container">
        <div class="service-detail-grid<?php echo $flip ? ' flip' : ''; ?>">

            <!-- Visual -->
            <div>
                <img src="<?php echo htmlspecialchars($svc['img']); ?>"
                     alt="<?php echo htmlspecialchars($svc['alt']); ?>"
                     class="service-visual-img"
                     loading="lazy">
            </div>

            <!-- Content -->
            <div>
                <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;color:var(--accent);margin-bottom:.5rem;">Our Services</div>
                <h2 style="color:var(--primary-dark);margin-bottom:.5rem;"><?php echo htmlspecialchars($svc['title']); ?></h2>
                <p style="color:var(--accent);font-weight:600;margin-bottom:1rem;"><?php echo $svc['tagline']; ?></p>
                <p style="color:var(--text-gray);margin-bottom:1.5rem;"><?php echo htmlspecialchars($svc['desc']); ?></p>

                <ul class="feature-list" style="display:grid;grid-template-columns:1fr 1fr;gap:.65rem;margin-bottom:1.75rem;">
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

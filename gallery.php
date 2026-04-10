<?php
$page_title = 'Gallery';
$page_desc  = 'View photos of our borewell drilling, repair, and pump installation projects across Bangalore and Karnataka.';
include 'includes/header.php';
?>

<!-- Page Banner -->
<div class="page-banner">
    <h1>Project Gallery</h1>
    <p class="breadcrumb"><a href="index.php">Home</a> &rsaquo; Gallery</p>
</div>

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Recent Projects</h2>
            <span class="underline"></span>
            <p>A glimpse of our work across Bangalore and Karnataka. Each project reflects our commitment to quality and precision.</p>
        </div>

        <!-- Filter Tabs -->
        <div style="display:flex;gap:.75rem;flex-wrap:wrap;justify-content:center;margin-bottom:2.5rem;" id="gallery-filters">
            <?php $cats = ['All','Drilling','Repair','Pump Installation','Cleaning','Casing']; ?>
            <?php foreach ($cats as $i => $cat): ?>
            <button
                class="gallery-filter-btn"
                data-filter="<?php echo strtolower(str_replace(' ','-',$cat)); ?>"
                style="padding:.5rem 1.25rem;border-radius:30px;border:2px solid var(--primary);background:<?php echo $i===0?'var(--primary)':'transparent'; ?>;color:<?php echo $i===0?'var(--white)':'var(--primary)'; ?>;font-weight:600;cursor:pointer;transition:.3s;font-size:.9rem;"
            ><?php echo htmlspecialchars($cat); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="gallery-grid" id="gallery-grid">
            <?php
            $items = [
                ['cat'=>'drilling',          'icon'=>'🔩', 'label'=>'Borewell Drilling – Whitefield',    'gradient'=>'135deg, var(--primary) 0%, var(--primary-dark) 100%'],
                ['cat'=>'pump-installation', 'icon'=>'⚙️', 'label'=>'Pump Installed – Koramangala',      'gradient'=>'135deg, #1976D2 0%, var(--primary) 100%'],
                ['cat'=>'repair',            'icon'=>'🔧', 'label'=>'Borewell Repair – Mysuru',          'gradient'=>'135deg, #2E7D32 0%, #1B5E20 100%'],
                ['cat'=>'cleaning',          'icon'=>'🫧', 'label'=>'Borewell Cleaning – Tumkur',        'gradient'=>'135deg, var(--accent) 0%, var(--accent-dark) 100%'],
                ['cat'=>'casing',            'icon'=>'🏗️', 'label'=>'PVC Casing – Electronic City',     'gradient'=>'135deg, #6A1B9A 0%, #4A148C 100%'],
                ['cat'=>'drilling',          'icon'=>'💧', 'label'=>'New Drilling – Hebbal',             'gradient'=>'135deg, #00695C 0%, #004D40 100%'],
                ['cat'=>'pump-installation', 'icon'=>'⚡', 'label'=>'Submersible Pump – Marathahalli',   'gradient'=>'135deg, #1565C0 0%, #283593 100%'],
                ['cat'=>'repair',            'icon'=>'🔬', 'label'=>'CCTV Inspection – Jayanagar',       'gradient'=>'135deg, #C62828 0%, #B71C1C 100%'],
                ['cat'=>'drilling',          'icon'=>'🏗️', 'label'=>'Agricultural Borewell – Kolar',    'gradient'=>'135deg, #558B2F 0%, #33691E 100%'],
                ['cat'=>'cleaning',          'icon'=>'💦', 'label'=>'Yield Restoration – Yelahanka',     'gradient'=>'135deg, #00838F 0%, #006064 100%'],
                ['cat'=>'casing',            'icon'=>'🔩', 'label'=>'MS Casing – Devanahalli',           'gradient'=>'135deg, #4527A0 0%, #311B92 100%'],
                ['cat'=>'pump-installation', 'icon'=>'🚿', 'label'=>'Kirloskar Pump – Ramanagara',       'gradient'=>'135deg, #EF6C00 0%, #E65100 100%'],
            ];
            foreach ($items as $item): ?>
            <div class="gallery-item" data-cat="<?php echo $item['cat']; ?>">
                <div class="placeholder-img" style="background:linear-gradient(<?php echo $item['gradient']; ?>);">
                    <span style="font-size:2.8rem;"><?php echo $item['icon']; ?></span>
                    <p><?php echo htmlspecialchars($item['label']); ?></p>
                </div>
                <div class="gallery-overlay"><i class="fas fa-expand-alt"></i></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.gallery-filter-btn:hover {
    background: var(--primary) !important;
    color: var(--white) !important;
}
</style>

<script>
document.querySelectorAll('.gallery-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const filter = this.dataset.filter;

        // Update active button
        document.querySelectorAll('.gallery-filter-btn').forEach(b => {
            b.style.background = 'transparent';
            b.style.color = 'var(--primary)';
        });
        this.style.background = 'var(--primary)';
        this.style.color = 'var(--white)';

        // Filter items
        document.querySelectorAll('#gallery-grid .gallery-item').forEach(item => {
            if (filter === 'all' || item.dataset.cat === filter) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<!-- CTA -->
<section style="background:var(--light-bg);padding:4rem 0;text-align:center;">
    <div class="container">
        <h2 style="color:var(--primary-dark);margin-bottom:.75rem;">Ready to Start Your Project?</h2>
        <p style="color:var(--text-gray);margin-bottom:1.75rem;max-width:480px;margin-left:auto;margin-right:auto;">Join hundreds of satisfied customers. Contact us today for a free site survey.</p>
        <a href="contact.php" class="btn btn-primary"><i class="fas fa-envelope"></i>&nbsp; Get Free Quote</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php
$page_title = 'Gallery';
$page_desc  = 'View photos of our borewell drilling, repair, and pump installation projects across Gurgaon and Haryana.';
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
            <p>A glimpse of our work across Gurgaon and Haryana. Each project reflects our commitment to quality and precision.</p>
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
                ['cat'=>'drilling',          'label'=>'Borewell Drilling – DLF Phase 1, Gurgaon',  'img'=>'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'pump-installation', 'label'=>'Pump Installed – Cyber City, Gurgaon',       'img'=>'https://images.unsplash.com/photo-1558618047-3c8c76ca7a3d?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'repair',            'label'=>'Borewell Repair – Faridabad, Haryana',        'img'=>'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'cleaning',          'label'=>'Borewell Cleaning – Manesar, Haryana',        'img'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'casing',            'label'=>'PVC Casing – Sohna Road, Gurgaon',            'img'=>'https://images.unsplash.com/photo-1590479773265-7464e5d48118?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'drilling',          'label'=>'New Drilling – Palam Vihar, Gurgaon',          'img'=>'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&h=450&auto=format&fit=crop&q=80&crop=entropy'],
                ['cat'=>'pump-installation', 'label'=>'Submersible Pump – Sector 82, Gurgaon',        'img'=>'https://images.unsplash.com/photo-1583675931520-c27b22264ccc?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'repair',            'label'=>'CCTV Inspection – Bahadurgarh, Haryana',       'img'=>'https://images.unsplash.com/photo-1563453392212-326f5e854473?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'drilling',          'label'=>'Agricultural Borewell – Rewari, Haryana',      'img'=>'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&h=450&auto=format&fit=crop&q=80'],
                ['cat'=>'cleaning',          'label'=>'Yield Restoration – Panipat, Haryana',         'img'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=450&auto=format&fit=crop&q=80&crop=entropy'],
                ['cat'=>'casing',            'label'=>'MS Casing – Karnal, Haryana',                  'img'=>'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&h=450&auto=format&fit=crop&q=80&crop=faces'],
                ['cat'=>'pump-installation', 'label'=>'Kirloskar Pump – Sonipat, Haryana',            'img'=>'https://images.unsplash.com/photo-1558618047-3c8c76ca7a3d?w=600&h=450&auto=format&fit=crop&q=80&crop=entropy'],
            ];
            foreach ($items as $item): ?>
            <div class="gallery-item" data-cat="<?php echo $item['cat']; ?>">
                <img src="<?php echo htmlspecialchars($item['img']); ?>"
                     alt="<?php echo htmlspecialchars($item['label']); ?>"
                     class="gallery-photo"
                     loading="lazy">
                <div class="gallery-caption"><?php echo htmlspecialchars($item['label']); ?></div>
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

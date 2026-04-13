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
                ['cat'=>'drilling',          'label'=>'Borewell Drilling – DLF Phase 1, Gurgaon',  'img'=>'https://github.com/user-attachments/assets/eb70646c-925b-4625-a0a9-6b2acb8fc9ef'],
                ['cat'=>'pump-installation', 'label'=>'Pump Installed – Cyber City, Gurgaon',       'img'=>'https://github.com/user-attachments/assets/f4bf1658-f820-43bd-8824-420cc7118f38'],
                ['cat'=>'repair',            'label'=>'Rotary Boring – Faridabad, Haryana',          'img'=>'https://github.com/user-attachments/assets/a55b4547-aa4b-45c5-a6cb-e7d5020bca41'],
                ['cat'=>'cleaning',          'label'=>'Borewell Cleaning – Manesar, Haryana',        'img'=>'https://github.com/user-attachments/assets/185aaba1-7f1a-4019-8697-2e3aa4ad659f'],
                ['cat'=>'casing',            'label'=>'Rainwater Harvesting – Sohna Road, Gurgaon',  'img'=>'https://github.com/user-attachments/assets/aa2f3937-2b0e-4fc7-977e-f80f61af27da'],
                ['cat'=>'drilling',          'label'=>'Hydrological Survey – Palam Vihar, Gurgaon',  'img'=>'https://github.com/user-attachments/assets/eab37cf0-7d2c-41fa-bc4f-0b1021a330a4'],
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

<!-- Lightbox -->
<div id="gallery-lightbox" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.88);z-index:9999;align-items:center;justify-content:center;flex-direction:column;padding:1.5rem;">
    <button id="lightbox-close" aria-label="Close" style="position:fixed;top:1.25rem;right:1.5rem;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;line-height:1;">&times;</button>
    <img id="lightbox-img" src="" alt="" style="max-width:90vw;max-height:80vh;object-fit:contain;border-radius:8px;box-shadow:0 8px 40px rgba(0,0,0,.6);">
    <p id="lightbox-caption" style="color:rgba(255,255,255,.85);margin-top:1rem;font-size:.95rem;text-align:center;max-width:600px;"></p>
</div>

<style>
.gallery-filter-btn:hover {
    background: var(--primary) !important;
    color: var(--white) !important;
}
#gallery-lightbox.active { display: flex !important; }
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

// Lightbox
(function () {
    const lightbox    = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCap = document.getElementById('lightbox-caption');
    const closeBtn    = document.getElementById('lightbox-close');

    function openLightbox(src, alt) {
        lightboxImg.src = src;
        lightboxImg.alt = alt;
        lightboxCap.textContent = alt;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightboxImg.src = '';
        document.body.style.overflow = '';
    }

    document.querySelectorAll('#gallery-grid .gallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            const img = item.querySelector('img.gallery-photo');
            const cap = item.querySelector('.gallery-caption');
            if (img) openLightbox(img.src, cap ? cap.textContent : img.alt);
        });
    });

    closeBtn.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', function (e) {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeLightbox();
    });
})();
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

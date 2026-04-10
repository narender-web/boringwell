// ===========================
// Mobile navigation toggle
// ===========================
const hamburger = document.querySelector('.hamburger');
const navLinks  = document.querySelector('.nav-links');

if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('open');
        navLinks.classList.toggle('open');
    });

    // Close menu when a link is clicked
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('open');
            navLinks.classList.remove('open');
        });
    });
}

// ===========================
// Active nav link highlight
// ===========================
(function () {
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.nav-links a').forEach(a => {
        const href = a.getAttribute('href');
        if (href === currentPage || (currentPage === '' && href === 'index.php')) {
            a.classList.add('active');
        }
    });
})();

// ===========================
// Back to top button
// ===========================
const backToTop = document.getElementById('back-to-top');
if (backToTop) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ===========================
// Animated counters
// ===========================
function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;

    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        el.textContent = Math.floor(current).toLocaleString() + (el.dataset.suffix || '');
    }, 16);
}

const counters = document.querySelectorAll('.counter-number[data-target]');
if (counters.length) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
}

// ===========================
// Fade-in on scroll
// ===========================
const fadeEls = document.querySelectorAll('.service-card, .why-card, .testimonial-card, .gallery-item, .area-item');
if (fadeEls.length && 'IntersectionObserver' in window) {
    fadeEls.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, idx * 80);
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    fadeEls.forEach(el => fadeObserver.observe(el));
}

// ===========================
// Contact form client-side validation
// ===========================
const contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        let valid = true;
        const fields = contactForm.querySelectorAll('[required]');

        fields.forEach(field => {
            field.style.borderColor = '';
            if (!field.value.trim()) {
                field.style.borderColor = '#C62828';
                valid = false;
            }
        });

        const emailField = contactForm.querySelector('input[type="email"]');
        if (emailField && emailField.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value.trim())) {
                emailField.style.borderColor = '#C62828';
                valid = false;
            }
        }

        if (!valid) {
            e.preventDefault();
        }
    });
}

// ===========================
// Get Quote Modal
// ===========================
(function () {
    const modal      = document.getElementById('quote-modal');
    const closeBtn   = document.getElementById('modal-close-btn');
    const modalForm  = document.getElementById('quote-modal-form');
    const redirectTo = document.getElementById('modal-redirect-to');
    const modalAlert = document.getElementById('modal-alert');

    if (!modal) return;

    // Set redirect_to to current page so flash notification appears here after submit
    if (redirectTo) {
        const page = window.location.pathname.split('/').pop() || 'index.php';
        redirectTo.value = page || 'index.php';
    }

    function openModal() {
        modal.hidden = false;
        document.body.style.overflow = 'hidden';
        modal.querySelector('input[name="name"]').focus();
    }

    function closeModal() {
        modal.hidden = true;
        document.body.style.overflow = '';
        if (modalAlert) {
            modalAlert.hidden = true;
            modalAlert.className = 'modal-alert';
            modalAlert.textContent = '';
        }
    }

    // Open modal on any element with data-modal="quote"
    document.querySelectorAll('[data-modal="quote"]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            e.preventDefault();
            openModal();
        });
    });

    // Close button
    if (closeBtn) closeBtn.addEventListener('click', closeModal);

    // Click outside modal container to close
    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });

    // Escape key to close
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.hidden) closeModal();
    });

    // Client-side validation for modal form
    if (modalForm) {
        modalForm.addEventListener('submit', function (e) {
            let valid = true;
            modalForm.querySelectorAll('[required]').forEach(function (field) {
                field.style.borderColor = '';
                if (!field.value.trim()) {
                    field.style.borderColor = '#C62828';
                    valid = false;
                }
            });

            const emailField = modalForm.querySelector('input[type="email"]');
            if (emailField && emailField.value.trim()) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value.trim())) {
                    emailField.style.borderColor = '#C62828';
                    valid = false;
                }
            }

            if (!valid) {
                e.preventDefault();
                if (modalAlert) {
                    modalAlert.className = 'modal-alert alert-error';
                    modalAlert.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please fill in all required fields correctly.';
                    modalAlert.hidden = false;
                }
            }
        });
    }

    // Auto-dismiss flash notification after 7 seconds
    const flash = document.getElementById('flash-notification');
    if (flash) {
        setTimeout(function () {
            flash.style.transition = 'opacity .5s ease';
            flash.style.opacity = '0';
            setTimeout(function () { flash.remove(); }, 500);
        }, 7000);
    }
})();

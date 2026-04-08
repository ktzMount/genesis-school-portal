/**
 * GENESIS SCHOOL - JAVASCRIPT FUNCIONALIDADES
 * script.js
 */

(function() {
    'use strict';

    // Initialize scripts when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeFormValidation();
        initializeNavigation();
        initializeScrollEffects();
    });

    /**
     * Form Validation
     */
    function initializeFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    }

    /**
     * Navigation Active State
     */
    function initializeNavigation() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = new URLSearchParams(link.search || link.href.split('?')[1]);
            const page = href.get('page') || 'home';
            
            if (page === currentPage) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Scroll Effects
     */
    function initializeScrollEffects() {
        const navbar = document.querySelector('.navbar');
        
        if (navbar) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-sm');
                } else {
                    navbar.classList.remove('shadow-sm');
                }
            });
        }
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    /**
     * Contact Form Submission
     */
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);
            
            // Show success message (in production, send to backend)
            showAlert('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
            
            // Reset form
            contactForm.reset();
        });
    }

    /**
     * Show Alert Message
     */
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.container');
        if (container) {
            container.insertBefore(alertDiv, container.firstChild);
        }
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    /**
     * Lazy Loading Images
     */
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img.lazy').forEach(img => {
            imageObserver.observe(img);
        });
    }

    /**
     * Event Filter
     */
    function initializeEventFilters() {
        const filterCheckboxes = document.querySelectorAll('[data-filter]');
        const events = document.querySelectorAll('[data-event-type]');

        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedFilters = Array.from(filterCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.dataset.filter);

                events.forEach(event => {
                    const eventType = event.dataset.eventType;
                    if (selectedFilters.length === 0 || selectedFilters.includes(eventType)) {
                        event.style.display = 'block';
                    } else {
                        event.style.display = 'none';
                    }
                });
            });
        });
    }

    /**
     * Mobile Menu Close on Click
     */
    const navbarCollapse = document.querySelector('.navbar-collapse');
    if (navbarCollapse) {
        const navLinks = navbarCollapse.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                const bsCollapse = new (window.bootstrap && window.bootstrap.Collapse)(navbarCollapse);
                bsCollapse.hide();
            });
        });
    }

    /**
     * Scroll to Top Button
     */
    const scrollTopBtn = document.createElement('button');
    scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollTopBtn.className = 'scroll-top-btn';
    scrollTopBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        cursor: pointer;
        display: none;
        z-index: 999;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    `;
    document.body.appendChild(scrollTopBtn);

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollTopBtn.style.display = 'flex';
            scrollTopBtn.style.alignItems = 'center';
            scrollTopBtn.style.justifyContent = 'center';
        } else {
            scrollTopBtn.style.display = 'none';
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    scrollTopBtn.addEventListener('mouseover', () => {
        scrollTopBtn.style.transform = 'scale(1.1)';
    });

    scrollTopBtn.addEventListener('mouseout', () => {
        scrollTopBtn.style.transform = 'scale(1)';
    });

})();

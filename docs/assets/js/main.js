/**
 * McCusker Engineering – Main JavaScript
 *
 * Features:
 *  - Mobile menu toggle
 *  - Smooth scroll for anchor links
 *  - Scroll-reveal animation for service cards (Intersection Observer)
 */

(function () {
    'use strict';

    /* -----------------------------------------------------------------------
       Mobile Menu Toggle
       ----------------------------------------------------------------------- */
    function initMobileMenu() {
        var toggle = document.querySelector('.menu-toggle');
        var menu   = document.getElementById('primary-menu');

        if (!toggle || !menu) {
            return;
        }

        toggle.addEventListener('click', function () {
            var isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        // Close menu when a nav link is clicked (useful on single-page sections)
        menu.addEventListener('click', function (e) {
            if (e.target && e.target.tagName === 'A') {
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menu on outside click
        document.addEventListener('click', function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /* -----------------------------------------------------------------------
       Smooth Scroll for Anchor Links
       ----------------------------------------------------------------------- */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var targetId = this.getAttribute('href').slice(1);
                if (!targetId) {
                    return;
                }
                var target = document.getElementById(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }

    /* -----------------------------------------------------------------------
       Scroll Reveal for Service Cards (Intersection Observer)
       ----------------------------------------------------------------------- */
    function initScrollReveal() {
        if (!('IntersectionObserver' in window)) {
            // Fallback: make all reveal elements visible immediately
            document.querySelectorAll('.reveal').forEach(function (el) {
                el.classList.add('visible');
            });
            return;
        }

        var observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.15,
                rootMargin: '0px 0px -40px 0px'
            }
        );

        document.querySelectorAll('.reveal').forEach(function (el) {
            observer.observe(el);
        });
    }

    /* -----------------------------------------------------------------------
       Gallery Category Filter
       ----------------------------------------------------------------------- */
    function initGalleryFilter() {
        var filterBtns = document.querySelectorAll('.gallery-filter-btn');
        var items      = document.querySelectorAll('.gallery-item');

        if (!filterBtns.length || !items.length) {
            return;
        }

        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var filter = this.getAttribute('data-filter');

                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                this.classList.add('active');

                items.forEach(function (item) {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    }

    /* -----------------------------------------------------------------------
       Gallery Lightbox (images & videos)
       ----------------------------------------------------------------------- */
    function initGalleryLightbox() {
        var lightbox = document.getElementById('galleryLightbox');
        if (!lightbox) {
            return;
        }

        var content  = lightbox.querySelector('.lightbox-content');
        var closeBtn = lightbox.querySelector('.lightbox-close');
        var items    = document.querySelectorAll('.gallery-item[data-full], .gallery-item[data-video]');

        items.forEach(function (item) {
            item.addEventListener('click', function () {
                var videoUrl = this.getAttribute('data-video');
                var imgUrl   = this.getAttribute('data-full');

                content.innerHTML = '';

                if (videoUrl) {
                    var iframe = document.createElement('iframe');
                    iframe.src = videoUrl;
                    iframe.setAttribute('allowfullscreen', '');
                    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                    iframe.title = this.querySelector('h3') ? this.querySelector('h3').textContent : 'Video';
                    content.appendChild(iframe);
                } else if (imgUrl) {
                    var img = document.createElement('img');
                    img.src = imgUrl;
                    img.alt = this.querySelector('h3') ? this.querySelector('h3').textContent : 'Project image';
                    content.appendChild(img);
                }

                lightbox.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeLightbox);
        }

        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && lightbox.classList.contains('is-open')) {
                closeLightbox();
            }
        });

        function closeLightbox() {
            lightbox.classList.remove('is-open');
            content.innerHTML = '';
            document.body.style.overflow = '';
        }
    }

    /* -----------------------------------------------------------------------
       Init on DOM Ready
       ----------------------------------------------------------------------- */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            initMobileMenu();
            initSmoothScroll();
            initScrollReveal();
            initGalleryFilter();
            initGalleryLightbox();
        });
    } else {
        initMobileMenu();
        initSmoothScroll();
        initScrollReveal();
        initGalleryFilter();
        initGalleryLightbox();
    }
}());

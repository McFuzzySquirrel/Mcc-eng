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
       Init on DOM Ready
       ----------------------------------------------------------------------- */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            initMobileMenu();
            initSmoothScroll();
            initScrollReveal();
        });
    } else {
        initMobileMenu();
        initSmoothScroll();
        initScrollReveal();
    }
}());

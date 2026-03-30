import './bootstrap';

// ── Alpine.js ─────────────────────────────────────────────────────────────
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// ── GSAP + Plugins ────────────────────────────────────────────────────────
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { TextPlugin } from 'gsap/TextPlugin';
gsap.registerPlugin(ScrollTrigger, TextPlugin);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.TextPlugin = TextPlugin;

// ── Swup SPA ──────────────────────────────────────────────────────────────
import Swup from 'swup';
import SwupHeadPlugin from '@swup/head-plugin';
window.Swup = Swup;
window.SwupHeadPlugin = SwupHeadPlugin;

// ── Font Awesome ──────────────────────────────────────────────────────────
import '@fortawesome/fontawesome-free/css/all.min.css';

// ── MAIN APPLICATION LOGIC ──────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize GSAP Plugins
    gsap.registerPlugin(ScrollTrigger, TextPlugin);

    // 2. Global Animations
    function initGlobalAnimations() {
        gsap.utils.toArray('.gsap-reveal').forEach(el => {
            gsap.fromTo(el,
                { y: 60, opacity: 0, filter: "blur(10px)" },
                {
                    scrollTrigger: { trigger: el, start: 'top 85%' },
                    y: 0,
                    opacity: 1,
                    filter: "blur(0px)",
                    duration: 1.5,
                    ease: "expo.out"
                }
            );
        });

        gsap.utils.toArray('.gsap-stagger').forEach(container => {
            gsap.fromTo(container.children,
                { y: 40, opacity: 0, scale: 0.95 },
                {
                    scrollTrigger: { trigger: container, start: 'top 85%' },
                    y: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    stagger: 0.1,
                    ease: "power4.out"
                }
            );
        });
        ScrollTrigger.refresh();
    }

    // 3. Preloader Timeline
    const preloader = document.getElementById('fnr-preloader');
    if (preloader) {
        document.body.style.overflow = 'hidden';
        
        const tl = gsap.timeline({
            onComplete: () => {
                preloader.style.display = 'none';
                document.body.style.overflow = '';
                document.dispatchEvent(new CustomEvent('preloaderDone'));
                initGlobalAnimations();
            }
        });

        tl.to('#fnr-logo', { y: 0, opacity: 1, duration: 1, ease: "power4.out", delay: 0.2 })
          .to('#fnr-loader-track', { opacity: 1, duration: 0.5 }, "-=0.5")
          .to('#fnr-loader-bar', { width: '100%', duration: 1.5, ease: "expo.inOut" })
          .add(() => {
              // REVEAL MAIN CONTENT
              gsap.to('#swup', { opacity: 1, duration: 1.2, ease: "power2.out" });
          }, "-=0.5")
          .to('#fnr-logo', { y: -50, opacity: 0, duration: 0.8, ease: "power3.in" }, "+=0.2")
          .to('#fnr-loader-track', { opacity: 0, duration: 0.4 }, "-=0.6")
          .to(preloader, { opacity: 0, duration: 0.8, ease: "power2.inOut" }, "-=0.2");
    } else {
        gsap.set('#swup', { opacity: 1 });
        initGlobalAnimations();
    }

    // 4. Cursor & Glow
    const glow = document.getElementById('cursor-glow');
    const dot = document.getElementById('cursor-dot');
    if (glow && dot) {
        document.addEventListener('mousemove', (e) => {
            gsap.to(glow, { x: e.clientX, y: e.clientY, duration: 1.2, ease: "power3.out" });
            gsap.to(dot, { x: e.clientX, y: e.clientY, duration: 0.2, ease: "power2.out" });
        });
    }

    // 5. Back to Top
    const btt = document.getElementById('back-to-top');
    if (btt) {
        window.addEventListener('scroll', () => {
            const isVisible = window.scrollY > 400;
            gsap.to(btt, {
                y: isVisible ? 0 : 40,
                opacity: isVisible ? 1 : 0,
                scale: isVisible ? 1 : 0.8,
                duration: 0.8,
                ease: "elastic.out(1, 0.75)",
                pointerEvents: isVisible ? 'auto' : 'none'
            });
        });

        btt.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 6. Theme Switcher Logic
    const root = document.documentElement;
    const toggleBtn = document.getElementById('theme-toggle');
    const icon = document.getElementById('theme-icon');

    function applyTheme(theme) {
        if (theme === 'dark') {
            root.classList.add('theme-dark', 'dark');
            if (icon) { icon.classList.remove('fa-moon'); icon.classList.add('fa-sun'); }
        } else {
            root.classList.remove('theme-dark', 'dark');
            if (icon) { icon.classList.remove('fa-sun'); icon.classList.add('fa-moon'); }
        }
    }

    const savedTheme = localStorage.getItem('theme') || 'dark';
    applyTheme(savedTheme);

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const isDark = root.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';
            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }

    // 7. Swup SPA Initialization
    if (typeof Swup !== 'undefined') {
        const swup = new Swup({
            containers: ['#swup'],
            plugins: [new SwupHeadPlugin()]
        });

        swup.hooks.on('content:replace', () => {
            ScrollTrigger.killAll();
        });

        swup.hooks.on('page:view', () => {
            initGlobalAnimations();
            document.dispatchEvent(new CustomEvent('pageLoaded'));
            window.scrollTo(0, 0);

            // GA4 Page Track
            if (typeof gtag === 'function' && window._gaId) {
                gtag('event', 'page_view', {
                    page_title: document.title,
                    page_location: window.location.href,
                    page_path: window.location.pathname,
                });
            }
        });
    }
});

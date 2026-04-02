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

// ── Lenis & Vanilla-Tilt ──────────────────────────────────────────────────
import Lenis from 'lenis';
import VanillaTilt from 'vanilla-tilt';
window.Lenis = Lenis;
window.VanillaTilt = VanillaTilt;

// ── App Modules ───────────────────────────────────────────────────────────
import { initGlobalAnimations } from './modules/animations';
import { initParticles } from './modules/particles';
import { initCrtBoot } from './modules/crt-boot';
import { initCustomLoaders } from './modules/loaders';
import { initThemeSwitcher } from './modules/theme';

// ── MAIN APPLICATION LOGIC ──────────────────────────────────────────────────

function initApp() {
    // 1. Initialize Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smooth: true,
    });
    
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => { lenis.raf(time * 1000); });
    gsap.ticker.lagSmoothing(0);

    // 2. Initialize Particles
    initParticles();

    // 3. Global TV Power On & CRT Splash Screen Focus
    initCrtBoot();

    // 4. Back to Top
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

    // 5. Theme Switcher Logic
    initThemeSwitcher();

    // 6. Swup SPA Initialization
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
            
            // Re-init features that might be lost inside #swup wrapper on view replace
            initCustomLoaders();
            
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

    // 7. Custom Loading Screens
    initCustomLoaders();
}

// Execute app logic: safe with type="module" since DOM is already parsed
initApp();

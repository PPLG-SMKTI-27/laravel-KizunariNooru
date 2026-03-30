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

// ── MAIN APPLICATION LOGIC ──────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize GSAP Plugins
    gsap.registerPlugin(ScrollTrigger, TextPlugin);

    // 1.5. Initialize Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smooth: true,
    });
    
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => { lenis.raf(time * 1000); });
    gsap.ticker.lagSmoothing(0);

    // 2. Global Animations & Enhancements
    function initGlobalAnimations() {
        // Init GSAP Reveal
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

        // Init GSAP Stagger
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
        
        // Init Vanilla-Tilt
        const tiltEls = document.querySelectorAll('[data-tilt]');
        if (tiltEls.length > 0) VanillaTilt.init(tiltEls);

        // ── Hero: SplitText-like character reveal ──────────────────────
        const heroTitle = document.getElementById('hero-title');
        if (heroTitle) {
            const spanEl = heroTitle.querySelector('span') || heroTitle;
            const originalText = spanEl.textContent.trim();
            spanEl.innerHTML = '';

            originalText.split('').forEach(char => {
                const c = document.createElement('span');
                c.style.display = 'inline-block';
                c.style.willChange = 'transform, opacity';
                c.textContent = char === ' ' ? '\u00a0' : char;
                spanEl.appendChild(c);
            });

            gsap.fromTo(spanEl.children,
                { y: 80, opacity: 0, rotateX: -90, filter: 'blur(8px)' },
                {
                    y: 0, opacity: 1, rotateX: 0, filter: 'blur(0px)',
                    duration: 1.2,
                    ease: 'power4.out',
                    stagger: 0.04,
                    delay: 0.2
                }
            );
        }

        // ── Hero: Animated badge and buttons entrance ─────────────────
        gsap.from('#hero-badge', { y: -30, opacity: 0, duration: 1, ease: 'back.out(2)', delay: 0.1 });
        gsap.from('.magnetic-btn', { y: 30, opacity: 0, duration: 0.8, stagger: 0.12, ease: 'power3.out', delay: 0.8 });

        // ── Count-Up Stats ─────────────────────────────────────────────
        document.querySelectorAll('[data-count-up]').forEach(el => {
            const target = parseFloat(el.getAttribute('data-count-up'));
            const suffix = el.getAttribute('data-count-suffix') || '';
            const counter = { val: 0 };
            ScrollTrigger.create({
                trigger: el,
                start: 'top 90%',
                once: true,
                onEnter: () => {
                    gsap.to(counter, {
                        val: target,
                        duration: 2,
                        ease: 'power2.out',
                        onUpdate: () => {
                            el.textContent = (Number.isInteger(target) 
                                ? Math.round(counter.val) 
                                : counter.val.toFixed(0)) + suffix;
                        }
                    });
                }
            });
        });

        ScrollTrigger.refresh();
    }

    // ── Canvas Particle System ─────────────────────────────────────────────
    function initParticles() {
        const canvas = document.getElementById('hero-particles');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let W = canvas.offsetWidth, H = canvas.offsetHeight;
        canvas.width = W; canvas.height = H;

        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced) return;

        let mouse = { x: W / 2, y: H / 2 };
        document.addEventListener('mousemove', e => { mouse.x = e.clientX; mouse.y = e.clientY; });

        const COUNT = Math.min(120, Math.floor(W * H / 8000));
        const particles = Array.from({ length: COUNT }, () => ({
            x: Math.random() * W, y: Math.random() * H,
            vx: (Math.random() - 0.5) * 0.4, vy: (Math.random() - 0.5) * 0.4,
            r: Math.random() * 1.5 + 0.3,
            alpha: Math.random() * 0.5 + 0.1,
        }));

        function draw() {
            ctx.clearRect(0, 0, W, H);
            particles.forEach(p => {
                // Mouse repulsion
                const dx = mouse.x - p.x, dy = mouse.y - p.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 100) { p.vx -= (dx / dist) * 0.05; p.vy -= (dy / dist) * 0.05; }

                p.x += p.vx; p.y += p.vy;
                p.vx *= 0.99; p.vy *= 0.99;
                if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
                if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(34,211,238,${p.alpha})`;
                ctx.fill();
            });

            // Draw connecting lines
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const d = Math.sqrt(dx * dx + dy * dy);
                    if (d < 120) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = `rgba(34,211,238,${0.08 * (1 - d / 120)})`;
                        ctx.lineWidth = 0.5;
                        ctx.stroke();
                    }
                }
            }
            requestAnimationFrame(draw);
        }
        draw();

        window.addEventListener('resize', () => {
            W = canvas.offsetWidth; H = canvas.offsetHeight;
            canvas.width = W; canvas.height = H;
        });
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

        const percentEl = document.getElementById('loader-percent');
        const statusEl = document.getElementById('loader-status');
        let progress = { val: 0 };

        // 1. Terminal texts type/appear
        tl.to('#loader-term-1', { opacity: 1, duration: 0.2, text: { value: "> SYSTEM_INIT: TRUE", delimiter: "" }, delay: 0.2 })
          .to('#loader-term-2', { opacity: 1, duration: 0.2, text: { value: "> NEURAL_NET: CONNECTED", delimiter: "" } }, "+=0.1")
        // 2. Logo appear
          .to('#fnr-logo', { y: 0, opacity: 1, duration: 1, ease: "power3.out" }, "-=0.1")
          .to('#loader-ui', { opacity: 1, duration: 0.4 }, "-=0.4")
        // 3. Progress bar animation
          .to(progress, {
              val: 100,
              duration: 1.5,
              ease: "power2.inOut",
              onUpdate: function() {
                  if(percentEl) percentEl.textContent = Math.round(progress.val) + '%';
                  if(statusEl && progress.val > 40 && progress.val < 80) statusEl.textContent = "VERIFYING...";
                  if(statusEl && progress.val >= 80) statusEl.textContent = "ONLINE //";
              }
          }, "-=0.2")
          .to('#fnr-loader-bar', { width: '100%', duration: 1.5, ease: "power2.inOut" }, "<")
        // 4. Glitch Effect on 100%
          .to(['#fnr-glitch-1', '#fnr-glitch-2'], { opacity: 0.8, duration: 0.08, yoyo: true, repeat: 3, ease: "steps(1)" }, "-=0.2")
        // 5. Fade out UI and Slide Up Reveal
          .add(() => {
              gsap.to('#swup', { opacity: 1, duration: 1.2, ease: "power2.out" });
          })
          .to('#fnr-logo', { scale: 1.1, opacity: 0, y: -20, duration: 0.6, ease: "power3.in" }, "+=0.1")
          .to('#loader-ui', { y: 20, opacity: 0, duration: 0.4 }, "-=0.5")
          .to(['#loader-term-1', '#loader-term-2'], { opacity: 0, duration: 0.3 }, "-=0.6")
          .to(preloader, { yPercent: -100, duration: 1, ease: "expo.inOut" }, "-=0.2");
    } else {
        gsap.set('#swup', { opacity: 1 });
        initGlobalAnimations();
    }

    // 4. Cursor effect removed as per user request.

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

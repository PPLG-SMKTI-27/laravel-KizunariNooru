import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import VanillaTilt from 'vanilla-tilt';

export function initGlobalAnimations() {
    // Init GSAP reveal
    gsap.utils.toArray('.gsap-reveal').forEach(el => {
        gsap.fromTo(el,
            { y: 60, opacity: 0 },
            {
                scrollTrigger: { trigger: el, start: 'top 85%' },
                y: 0,
                opacity: 1,
                duration: 1.5,
                ease: "expo.out"
            }
        );
    });

    // Luxury Reveal (Serif text)
    gsap.utils.toArray('.gsap-reveal-l').forEach(el => {
        gsap.fromTo(el,
            { y: 30, opacity: 0, fontStyle: "normal" },
            {
                scrollTrigger: { trigger: el, start: 'top 90%' },
                y: 0,
                opacity: 1,
                fontStyle: "italic",
                duration: 2,
                ease: "power2.out",
                delay: 0.3
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

    // ── Hero: Reliable Title Reveal ──────────────────────
    const heroTitle = document.getElementById('hero-title');
    if (heroTitle) {
        gsap.fromTo(heroTitle,
            { y: 30, opacity: 0, scale: 0.98 },
            { y: 0, opacity: 1, scale: 1, duration: 1.2, ease: 'power4.out', delay: 0.2 }
        );
    }

    // ── Hero: Animated badge and buttons entrance ─────────────────
    const heroBadge = document.getElementById('hero-badge');
    if (heroBadge) {
        gsap.from(heroBadge, { y: -20, opacity: 0, duration: 1.2, ease: 'back.out(1.5)', delay: 0.1 });
    }
    
    const magneticBtns = document.querySelectorAll('.magnetic-btn-reveal');
    if (magneticBtns.length > 0) {
        gsap.from(magneticBtns, { 
            y: 20, 
            opacity: 0, 
            duration: 1.2, 
            stagger: 0.2, 
            ease: 'power3.out', 
            delay: 0.6,
            clearProps: "all"
        });

        // Interactive Magnetic Effect
        magneticBtns.forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                gsap.to(btn, {
                    x: x * 0.35,
                    y: y * 0.35,
                    duration: 0.4,
                    ease: 'power2.out'
                });
            });
            
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, { x: 0, y: 0, duration: 0.7, ease: 'elastic.out(1, 0.5)' });
            });
        });
    }

    // ── Orbital Badges: Floating & Parallax ────────────────────────
    const orbitalBadges = document.querySelectorAll('.float-badge');
    if (orbitalBadges.length > 0) {
        // Initial reveal
        gsap.from(orbitalBadges, {
            scale: 0,
            opacity: 0,
            duration: 1.5,
            stagger: 0.1,
            ease: "elastic.out(1, 0.5)",
            delay: 1
        });

        // Gentle persistent float
        orbitalBadges.forEach((badge, i) => {
            gsap.to(badge, {
                y: "random(-15, 15)",
                x: "random(-10, 10)",
                rotation: "random(-5, 5)",
                duration: `random(3, 5)`,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: i * 0.2
            });
        });

        // Mouse Parallax
        window.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            orbitalBadges.forEach(badge => {
                const factor = parseFloat(badge.getAttribute('data-parallax')) || 0.05;
                const moveX = (clientX - centerX) * factor;
                const moveY = (clientY - centerY) * factor;

                gsap.to(badge, {
                    x: moveX,
                    y: moveY,
                    duration: 1.5,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
        });
    }

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

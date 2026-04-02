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


    // 3. Global TV Power On & CRT Splash Screen Focus
    const preloader = document.getElementById('fnr-preloader');
    const tvPowerOn = document.getElementById('tv-power-on');
    const tvLine = document.getElementById('tv-line');

    if (preloader) {
        document.body.style.overflow = 'hidden';
        gsap.set('#swup', { opacity: 0 }); // Hide main app initially
        
        // --- Retro Boot Sequence ---
        let isReadyToBoot = false; // Wait until loading finishes
        let booted = false;
        
        const bootSequenceTl = gsap.timeline({
            paused: true,
            onComplete: () => {
                isReadyToBoot = true;
                const msgWait = document.getElementById('crt-msg-wait');
                const msgReady = document.getElementById('crt-msg-ready');
                const menuOpts = document.getElementById('crt-menu-options');
                
                // Use display style directly since we removed Tailwind hidden class
                if(msgWait) msgWait.style.display = 'none';
                if(msgReady) msgReady.style.display = 'flex';
                if(menuOpts) {
                    menuOpts.style.opacity = '1';
                    menuOpts.style.pointerEvents = 'auto';
                }
                
                const btnEnter = document.getElementById('btn-enter');
                if(btnEnter) btnEnter.focus();
            }
        });
        
        bootSequenceTl.to('#boot-cursor', { opacity: 1, duration: 0.1 })
          .to('#boot-text-1', { opacity: 1, duration: 0.1, delay: 0.2 })
          .to('#boot-text-2', { opacity: 1, duration: 0.1, delay: 0.1 })
          .to('#boot-text-3', { opacity: 1, duration: 0.1, delay: 0.3 })
          .to('#boot-text-4', { opacity: 1, duration: 0.1, delay: 0.1 });
          
        const memObj = { val: 0 };
        bootSequenceTl.to(memObj, { 
            val: 640000, 
            duration: 0.6, 
            ease: "none",
            onUpdate: () => {
                const memEl = document.getElementById('boot-mem');
                if(memEl) memEl.innerText = Math.round(memObj.val / 1000);
            }
        });

        bootSequenceTl.to('#boot-text-5', { opacity: 1, duration: 0.1, delay: 0.2 })
          .set('#boot-text-6', { display: 'block' })
          .to('#boot-text-6', { opacity: 1, duration: 0.1, delay: 0.2 });

        const percentObj = { val: 0 };
        bootSequenceTl.to(percentObj, {
            val: 100,
            duration: 1,
            ease: "power1.inOut",
            onUpdate: () => {
                const percEl = document.getElementById('boot-percent');
                if(percEl) percEl.innerText = Math.round(percentObj.val) + '%';
            }
        });
        
        bootSequenceTl.to('#crt-boot-sequence', { opacity: 0, duration: 0.2, delay: 0.3, display: 'none' })
          .to('#crt-main-menu', { opacity: 1, duration: 0.4, ease: "power2.out" });

        // --- Global TV Power On Effect ---
        if (tvPowerOn && tvLine) {
            const tvTl = gsap.timeline({
                onComplete: () => {
                    gsap.set(tvPowerOn, { display: 'none' });
                    bootSequenceTl.play(); // trigger CRT boot
                }
            });
            tvTl.to(tvLine, { opacity: 1, duration: 0.1, delay: 0.3 })
              .to(tvLine, { width: '80%', duration: 0.4, ease: "power4.out" })
              .to(tvLine, { height: '100vh', width: '100vw', duration: 0.3, ease: "expo.in" })
              .to(tvPowerOn, { opacity: 0, duration: 0.5, ease: "power2.inOut" }, "+=0.1");
        } else {
            bootSequenceTl.play();
        }

        // --- User Interaction ---
        const bootSystem = (e) => {
            if (e) { e.preventDefault(); e.stopPropagation(); }
            if (booted || !isReadyToBoot) return;
            booted = true;
            
            const tl = gsap.timeline({
                onComplete: () => {
                    preloader.style.display = 'none';
                    document.body.style.overflow = '';
                    document.dispatchEvent(new CustomEvent('preloaderDone'));
                    initGlobalAnimations();
                }
            });

            tl.to('.crt-monitor', { scale: 1.05, filter: 'contrast(1.5) brightness(1.5)', duration: 0.1, yoyo: true, repeat: 3 })
              .to('.crt-monitor', { scale: 0.8, opacity: 0, duration: 0.4, ease: 'back.in(1)' })
              .to(preloader, { yPercent: -100, opacity: 0, duration: 1, ease: 'expo.inOut' }, "-=0.2")
              .to('#swup', { opacity: 1, duration: 1.2, ease: 'power2.out' }, "-=0.8");
        };
        window.bootSystemOsc = bootSystem;

        // Wire btn-enter
        const btnEnterEl = document.getElementById('btn-enter');
        if (btnEnterEl) {
            btnEnterEl.addEventListener('click', bootSystem);
            btnEnterEl.addEventListener('touchend', bootSystem, { passive: false });
        }

        // --- Action RPG Minigame Engine ---
        initRetroMinigame();

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

function initRetroMinigame() {
    const canvas = document.getElementById('retro-game-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    const btnGame = document.getElementById('btn-game');
    const crtMainMenu = document.getElementById('crt-main-menu');
    const crtGameContainer = document.getElementById('crt-game-container');
    const btnRestart = document.getElementById('btn-restart');
    const btnQuit = document.getElementById('btn-quit');
    const gameOverScreen = document.getElementById('game-over-screen');
    const scoreEl = document.getElementById('game-score');
    const hpEl = document.getElementById('game-hp');
    const finalScoreEl = document.getElementById('game-final-score');
    
    let isPlaying = false;
    let keys = {};
    let lastTime = 0;
    
    let player = { x: 200, y: 150, size: 8, speed: 120, hp: 100, facing: {x:0, y:-1} };
    let enemies = [];
    let bullets = [];
    let score = 0;
    
    let enemySpawnTimer = 0;
    let enemySpawnRate = 1.0; // seconds
    let lastAttackTime = 0;
    
    window.addEventListener('keydown', e => { keys[e.code] = true; });
    window.addEventListener('keyup', e => { keys[e.code] = false; });
    
    function startMinigame(e) {
        if (e) { e.preventDefault(); e.stopPropagation(); }
        if(crtMainMenu) crtMainMenu.classList.add('hidden');
        if(crtGameContainer) {
            crtGameContainer.classList.remove('hidden');
            crtGameContainer.classList.add('flex');
        }
        resetGame();
    }

    // Wire btn-game with every possible event
    if (btnGame) {
        // Force inline style so no CSS can override
        btnGame.style.pointerEvents = 'auto';
        btnGame.style.cursor = 'pointer';
        btnGame.style.position = 'relative';
        btnGame.style.zIndex = '9999';

        btnGame.addEventListener('click', startMinigame);
        btnGame.addEventListener('touchend', startMinigame, { passive: false });
        btnGame.addEventListener('pointerup', startMinigame);
    }

    window.startRetroMinigame = startMinigame;
    
    function resetGame() {
        player = { x: 200, y: 150, size: 8, speed: 150, hp: 100, facing: {x:0, y:-1} };
        enemies = [];
        bullets = [];
        score = 0;
        enemySpawnRate = 1.0;
        enemySpawnTimer = 0;
        isPlaying = true;
        gameOverScreen.classList.add('hidden');
        updateUI();
        lastTime = performance.now();
        requestAnimationFrame(gameLoop);
    }
    
    function quitGame() {
        isPlaying = false;
        if(crtGameContainer) {
            crtGameContainer.classList.add('hidden');
            crtGameContainer.classList.remove('flex');
        }
        if(crtMainMenu) crtMainMenu.classList.remove('hidden');
        const btnEnter = document.getElementById('btn-enter');
        if(btnEnter) btnEnter.focus();
    }
    
    // NOTE: btnGame click is already wired above (lines with btnGame.addEventListener)
    // Do NOT add it again here to avoid duplicate triggers
    if (btnRestart) btnRestart.addEventListener('click', resetGame);
    if (btnQuit) btnQuit.addEventListener('click', quitGame);

    // ── Mobile Gamepad Touch Controls ──────────────────────────────────────
    function wireGamepadTouch() {
        // Map gamepad button IDs to their corresponding key codes
        const gpMap = [
            { id: 'gp-up',     key: 'ArrowUp'    },
            { id: 'gp-down',   key: 'ArrowDown'  },
            { id: 'gp-left',   key: 'ArrowLeft'  },
            { id: 'gp-right',  key: 'ArrowRight' },
            { id: 'gp-attack', key: 'Space'       },
        ];

        gpMap.forEach(({ id, key }) => {
            const btn = document.getElementById(id);
            if (!btn) return;

            // Touch events (mobile)
            btn.addEventListener('touchstart', (e) => {
                e.preventDefault();
                keys[key] = true;
            }, { passive: false });
            btn.addEventListener('touchend', (e) => {
                e.preventDefault();
                keys[key] = false;
            }, { passive: false });
            btn.addEventListener('touchcancel', (e) => {
                e.preventDefault();
                keys[key] = false;
            }, { passive: false });

            // Mouse events (desktop testing / fallback)
            btn.addEventListener('mousedown', () => { keys[key] = true; });
            btn.addEventListener('mouseup',   () => { keys[key] = false; });
            btn.addEventListener('mouseleave',() => { keys[key] = false; });
        });

        // Quit button
        const mobileQuitBtn = document.getElementById('gp-quit-mobile');
        if (mobileQuitBtn) {
            mobileQuitBtn.addEventListener('touchend', (e) => {
                e.preventDefault();
                quitGame();
            }, { passive: false });
            mobileQuitBtn.addEventListener('click', () => quitGame());
        }

        // Release all keys when game loses focus (prevent stuck keys)
        canvas.addEventListener('touchstart', (e) => {
            // Prevent canvas touch from scrolling the page
            e.preventDefault();
        }, { passive: false });
    }
    wireGamepadTouch();
    
    // Additional Global Key Listeners for states
    window.addEventListener('keydown', e => {
        if (!isPlaying && !gameOverScreen.classList.contains('hidden') && e.code === 'KeyR') resetGame();
        if (e.code === 'Escape' && !crtGameContainer.classList.contains('hidden')) quitGame();
    });

    function updateUI() {
        scoreEl.innerText = `SCORE: ${score.toString().padStart(3, '0')}`;
        hpEl.innerText = `HP: ${Math.max(0, player.hp)}%`;
        if (player.hp <= 30) hpEl.classList.add('animate-blink');
        else hpEl.classList.remove('animate-blink');
    }
    
    function spawnEnemy() {
        const side = Math.floor(Math.random() * 4);
        let ex, ey;
        if (side === 0) { ex = Math.random() * canvas.width; ey = -10; } // Top
        else if (side === 1) { ex = Math.random() * canvas.width; ey = canvas.height + 10; } // Bottom
        else if (side === 2) { ex = -10; ey = Math.random() * canvas.height; } // Left
        else { ex = canvas.width + 10; ey = Math.random() * canvas.height; } // Right
        
        enemies.push({ x: ex, y: ey, size: 8, speed: 40 + (score * 2), hp: 1 });
    }

    function gameLoop(time) {
        if (!isPlaying) return;
        const dt = (time - lastTime) / 1000;
        lastTime = time;
        
        // Physics & Input
        let dx = 0; let dy = 0;
        if (keys['KeyW'] || keys['ArrowUp']) dy -= 1;
        if (keys['KeyS'] || keys['ArrowDown']) dy += 1;
        if (keys['KeyA'] || keys['ArrowLeft']) dx -= 1;
        if (keys['KeyD'] || keys['ArrowRight']) dx += 1;
        
        if (dx !== 0 || dy !== 0) {
            const mag = Math.sqrt(dx*dx + dy*dy);
            player.x += (dx/mag) * player.speed * dt;
            player.y += (dy/mag) * player.speed * dt;
            player.facing = { x: dx/mag, y: dy/mag };
        }
        
        // Confine player
        player.x = Math.max(player.size, Math.min(canvas.width - player.size, player.x));
        player.y = Math.max(player.size, Math.min(canvas.height - player.size, player.y));
        
        // Attacking (Space)
        if (keys['Space'] && time - lastAttackTime > 250) {
            lastAttackTime = time;
            bullets.push({
                x: player.x + (player.facing.x * 12),
                y: player.y + (player.facing.y * 12),
                vx: player.facing.x * 300,
                vy: player.facing.y * 300,
                size: 3, life: 1.0
            });
        }
        
        // Update Bullets
        for (let i = bullets.length - 1; i >= 0; i--) {
            let b = bullets[i];
            b.x += b.vx * dt;
            b.y += b.vy * dt;
            b.life -= dt;
            if (b.life <= 0 || b.x < 0 || b.x > canvas.width || b.y < 0 || b.y > canvas.height) {
                bullets.splice(i, 1);
            }
        }
        
        // Enemy Spawner
        enemySpawnTimer += dt;
        if (enemySpawnTimer > enemySpawnRate) {
            spawnEnemy();
            enemySpawnTimer = 0;
            enemySpawnRate = Math.max(0.2, enemySpawnRate * 0.98); // harder over time
        }
        
        // Update Enemies
        for (let i = enemies.length - 1; i >= 0; i--) {
            let e = enemies[i];
            const ex = player.x - e.x;
            const ey = player.y - e.y;
            const emag = Math.sqrt(ex*ex + ey*ey);
            
            if (emag > 0) {
                e.x += (ex/emag) * e.speed * dt;
                e.y += (ey/emag) * e.speed * dt;
            }
            
            // Collision with player
            if (emag < (player.size + e.size)) {
                player.hp -= 10;
                enemies.splice(i, 1);
                updateUI();
                
                // Screen Shake Effect
                canvas.style.transform = `translate(${(Math.random()-0.5)*10}px, ${(Math.random()-0.5)*10}px)`;
                setTimeout(()=> canvas.style.transform = "none", 50);
                
                if (player.hp <= 0) {
                    isPlaying = false;
                    finalScoreEl.innerText = score.toString().padStart(3, '0');
                    gameOverScreen.classList.remove('hidden');
                    return; // End loop
                }
                continue; // Skip bullet check so we don't crash loop
            }
            
            // Collision with bullets
            let hit = false;
            for (let j = bullets.length - 1; j >= 0; j--) {
                let b = bullets[j];
                const bx = b.x - e.x;
                const by = b.y - e.y;
                if (Math.sqrt(bx*bx + by*by) < e.size + b.size) {
                    enemies.splice(i, 1);
                    bullets.splice(j, 1);
                    score += 10;
                    updateUI();
                    hit = true;
                    break;
                }
            }
        }
        
        // Render Routine
        ctx.fillStyle = '#0a0f12';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Grid Effect
        ctx.strokeStyle = 'rgba(34,211,238,0.05)';
        ctx.lineWidth = 1;
        for(let i=0; i<canvas.width; i+=20) { ctx.beginPath(); ctx.moveTo(i,0); ctx.lineTo(i,canvas.height); ctx.stroke(); }
        for(let i=0; i<canvas.height; i+=20) { ctx.beginPath(); ctx.moveTo(0,i); ctx.lineTo(canvas.width,i); ctx.stroke(); }

        // Draw Bullets (Cyan lasers)
        ctx.fillStyle = '#0ff';
        bullets.forEach(b => {
            ctx.shadowBlur = 10;
            ctx.shadowColor = '#0ff';
            ctx.beginPath();
            ctx.arc(b.x, b.y, b.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;
        });
        
        // Draw Enemies (Red squares)
        ctx.fillStyle = '#f00';
        enemies.forEach(e => {
            ctx.shadowBlur = 10;
            ctx.shadowColor = '#f00';
            ctx.fillRect(e.x - e.size, e.y - e.size, e.size * 2, e.size * 2);
            
            // Evil eye
            ctx.fillStyle = '#fff';
            ctx.shadowBlur = 0;
            ctx.fillRect(e.x - 2, e.y - 4, 4, 4);
            ctx.fillStyle = '#f00';
        });
        
        // Draw Player (Cyan square + Cannon)
        ctx.shadowBlur = 0;
        ctx.fillStyle = '#fff';
        ctx.fillRect(player.x - player.size, player.y - player.size, player.size * 2, player.size * 2);
        
        // Player direction indicator
        ctx.fillStyle = '#0ff';
        ctx.fillRect(player.x + (player.facing.x * 6) - 2, player.y + (player.facing.y * 6) - 2, 4, 4);
        
        requestAnimationFrame(gameLoop);
    }
}


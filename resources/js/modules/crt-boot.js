import { gsap } from 'gsap';
import { initGlobalAnimations } from './animations.js';
import { initRetroMinigame } from './minigame.js';

export function initCrtBoot() {
    // Global TV Power On & CRT Splash Screen Focus
    const preloader = document.getElementById('fnr-preloader');
    const tvPowerOn = document.getElementById('tv-power-on');
    const tvLine = document.getElementById('tv-line');

    if (preloader) {
        // Skip CRT boot if already booted in this session (e.g. after language switch/refresh)
        if (sessionStorage.getItem('fnr_booted') === 'true') {
            preloader.style.display = 'none';
            if (tvPowerOn) tvPowerOn.style.display = 'none';
            document.body.style.overflow = '';
            gsap.set('#swup', { opacity: 1 });
            initGlobalAnimations();
        } else {
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
                        sessionStorage.setItem('fnr_booted', 'true'); // <--- STORE STATE HERE
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

            // Wire btn-enter & btn-game more robustly
            const btnEnterEl = document.getElementById('btn-enter');
            const btnGameEl = document.getElementById('btn-game');

            if (btnEnterEl) {
                // Use pointerdown for faster response and better compatibility
                btnEnterEl.addEventListener('pointerdown', bootSystem);
                // Keep click as fallback
                btnEnterEl.addEventListener('click', (e) => {
                    if (!booted) bootSystem(e);
                });
            }
            
            if (btnGameEl) {
                // Although minigame.js wires this, we ensure it's clickable by parent pointer-events
                btnGameEl.style.pointerEvents = 'auto';
                btnGameEl.style.cursor = 'pointer';
            }

            // --- Action RPG Minigame Engine ---
            initRetroMinigame();
        } // end else
    } else {
        gsap.set('#swup', { opacity: 1 });
        initGlobalAnimations();
    }
}

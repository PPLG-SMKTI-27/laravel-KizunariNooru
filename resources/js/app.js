// Import modules
import './bootstrap';
import './animations';
import './rain';
import './reveal';
import './typing';

// Initialize GSAP
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import ScrollToPlugin from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
window.gsap = gsap;

// Initialize Alpine
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Portfolio loaded with Furina theme!');
    
    // Initialize animations
    if (window.initAnimations) window.initAnimations();
    if (window.initRainEffect) window.initRainEffect();
    if (window.initTypingEffect) window.initTypingEffect();
});

// resources/js/app.js - Tambahkan ini:

import { initRainEffect } from './rain';

// Dalam DOMContentLoaded:
document.addEventListener('DOMContentLoaded', function() {
    // ... kode lainnya ...
    
    // Initialize rain effect
    if (typeof initRainEffect === 'function') {
        initRainEffect();
    }
});



import { initRainEffect } from './rain';
initRainEffect();
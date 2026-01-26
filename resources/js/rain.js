// resources/js/rain.js

export function initRainEffect() {
    console.log('Initializing Furina Rain Effect...');
    
    const rainContainer = document.getElementById('rain-container');
    if (!rainContainer) return;
    
    // Create rain layers
    createRainLayer('rain-layer-1', 80, 'fast');
    createRainLayer('rain-layer-2', 50, 'medium');
    createRainLayer('rain-layer-3', 30, 'slow');
    
    // Create hydro particles
    createHydroParticles('hydro-particles', 20);
    
    // Create water ripples
    createWaterRipples('water-ripples');
    
    // Mouse interaction
    initMouseInteraction();
    
    // Rain intensity based on scroll
    initScrollIntensity();
}

function createRainLayer(layerId, dropCount, speed = 'medium') {
    const layer = document.getElementById(layerId);
    if (!layer) return;
    
    // Clear existing drops
    layer.innerHTML = '';
    
    // Speed settings
    const speedMap = {
        'fast': { duration: 0.8, delay: 0.1, class: 'rain-drop-thick' },
        'medium': { duration: 1.5, delay: 0.3, class: 'rain-drop' },
        'slow': { duration: 2.5, delay: 0.5, class: 'rain-drop-thin' }
    };
    
    const settings = speedMap[speed] || speedMap.medium;
    
    // Create rain drops
    for (let i = 0; i < dropCount; i++) {
        const drop = document.createElement('div');
        drop.className = `rain-drop ${settings.class}`;
        
        // Random position
        const left = Math.random() * 100;
        const height = 20 + Math.random() * 40;
        
        // Apply styles
        drop.style.left = `${left}%`;
        drop.style.height = `${height}px`;
        drop.style.opacity = '0.7';
        
        // Random animation
        const duration = settings.duration + Math.random() * 1;
        const delay = Math.random() * 2;
        const animationName = speed === 'fast' ? 'rain-fall-fast' : 
                             speed === 'slow' ? 'rain-fall-slow' : 'rain-fall';
        
        drop.style.animation = `${animationName} ${duration}s linear infinite`;
        drop.style.animationDelay = `${delay}s`;
        
        // Random slight rotation
        const rotation = 10 + Math.random() * 20;
        drop.style.transform = `rotate(${rotation}deg)`;
        
        layer.appendChild(drop);
    }
}

function createHydroParticles(containerId, particleCount) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    // Clear existing particles
    container.innerHTML = '';
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'hydro-particle';
        
        // Random size
        const size = 5 + Math.random() * 20;
        
        // Random position
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        
        // Apply styles
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${left}%`;
        particle.style.top = `${top}%`;
        
        // Random animation
        const duration = 15 + Math.random() * 20;
        const delay = Math.random() * 5;
        
        particle.style.animation = `float-particle ${duration}s ease-in-out infinite`;
        particle.style.animationDelay = `${delay}s`;
        
        // Random color tint
        const hue = 180 + Math.random() * 40; // Cyan to blue range
        particle.style.background = `radial-gradient(circle, hsla(${hue}, 100%, 60%, 0.4), transparent 70%)`;
        
        container.appendChild(particle);
    }
}

function createWaterRipples(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    // Create ripples at random intervals
    setInterval(() => {
        if (Math.random() > 0.7) { // 30% chance to create ripple
            createRipple(container);
        }
    }, 1000);
}

function createRipple(container) {
    const ripple = document.createElement('div');
    ripple.className = 'water-ripple';
    
    // Random position along bottom
    const left = 10 + Math.random() * 80;
    
    // Random size
    const width = 50 + Math.random() * 100;
    
    // Apply styles
    ripple.style.left = `${left}%`;
    ripple.style.width = `${width}px`;
    ripple.style.height = `${width * 0.1}px`;
    
    // Animation
    ripple.style.animation = `ripple-expand ${2 + Math.random() * 2}s ease-out forwards`;
    
    container.appendChild(ripple);
    
    // Remove after animation completes
    setTimeout(() => {
        if (ripple.parentNode === container) {
            container.removeChild(ripple);
        }
    }, 3000);
}

function initMouseInteraction() {
    const rainContainer = document.getElementById('rain-container');
    if (!rainContainer) return;
    
    let mouseX = 0;
    let mouseY = 0;
    
    // Track mouse position
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        
        // Create ripple on mouse move (with throttle)
        if (Math.random() > 0.9) {
            createMouseRipple(mouseX, mouseY);
        }
        
        // Affect rain density near cursor
        affectRainNearCursor(mouseX, mouseY);
    });
    
    // Create ripple on click
    document.addEventListener('click', (e) => {
        createClickRipple(e.clientX, e.clientY);
    });
}

function createMouseRipple(x, y) {
    const hydroParticles = document.getElementById('hydro-particles');
    if (!hydroParticles) return;
    
    const particle = document.createElement('div');
    particle.className = 'hydro-particle';
    
    // Small particle size
    const size = 3 + Math.random() * 8;
    
    // Position at cursor
    particle.style.width = `${size}px`;
    particle.style.height = `${size}px`;
    particle.style.left = `${x}px`;
    particle.style.top = `${y}px`;
    
    // Quick float animation
    particle.style.animation = `float-particle ${2 + Math.random() * 3}s ease-out forwards`;
    
    // Bright cyan color
    particle.style.background = `radial-gradient(circle, rgba(34, 211, 238, 0.8), transparent 70%)`;
    
    hydroParticles.appendChild(particle);
    
    // Remove after animation
    setTimeout(() => {
        if (particle.parentNode === hydroParticles) {
            hydroParticles.removeChild(particle);
        }
    }, 3000);
}

function createClickRipple(x, y) {
    const hydroParticles = document.getElementById('hydro-particles');
    if (!hydroParticles) return;
    
    // Create multiple particles on click
    for (let i = 0; i < 5; i++) {
        setTimeout(() => {
            const particle = document.createElement('div');
            particle.className = 'hydro-particle';
            
            const size = 10 + Math.random() * 20;
            const offsetX = (Math.random() - 0.5) * 50;
            const offsetY = (Math.random() - 0.5) * 50;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${x + offsetX}px`;
            particle.style.top = `${y + offsetY}px`;
            
            particle.style.animation = `float-particle ${1 + Math.random() * 2}s ease-out forwards`;
            particle.style.background = `radial-gradient(circle, rgba(59, 130, 246, 0.7), transparent 70%)`;
            
            hydroParticles.appendChild(particle);
            
            setTimeout(() => {
                if (particle.parentNode === hydroParticles) {
                    hydroParticles.removeChild(particle);
                }
            }, 2000);
        }, i * 100);
    }
}

function affectRainNearCursor(x, y) {
    // This function makes rain drops avoid or attract to cursor
    const rainDrops = document.querySelectorAll('.rain-drop');
    
    rainDrops.forEach(drop => {
        const rect = drop.getBoundingClientRect();
        const dropX = rect.left + rect.width / 2;
        const dropY = rect.top;
        
        // Calculate distance to cursor
        const distance = Math.sqrt(Math.pow(dropX - x, 2) + Math.pow(dropY - y, 2));
        
        // If close to cursor, make drop speed up or change direction
        if (distance < 100) {
            // Create repulsion effect
            const speed = parseFloat(drop.style.animationDuration) || 1.5;
            drop.style.animationDuration = `${speed * 0.7}s`; // Speed up
            
            // Add glow effect
            drop.style.boxShadow = '0 0 10px rgba(34, 211, 238, 0.5)';
            
            // Reset after a short time
            setTimeout(() => {
                drop.style.animationDuration = '';
                drop.style.boxShadow = '';
            }, 200);
        }
    });
}

function initScrollIntensity() {
    let lastScroll = 0;
    let intensity = 1;
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;
        const scrollDelta = Math.abs(currentScroll - lastScroll);
        
        // Increase rain intensity when scrolling fast
        if (scrollDelta > 50) {
            intensity = Math.min(2, intensity + 0.1);
        } else {
            intensity = Math.max(0.5, intensity - 0.01);
        }
        
        // Apply intensity to rain speed
        const rainDrops = document.querySelectorAll('.rain-drop');
        rainDrops.forEach(drop => {
            const originalDuration = parseFloat(drop.style.animationDuration) || 1.5;
            drop.style.animationDuration = `${originalDuration / intensity}s`;
        });
        
        lastScroll = currentScroll;
    });
}

// Export for use in app.js
export default {
    initRainEffect
};
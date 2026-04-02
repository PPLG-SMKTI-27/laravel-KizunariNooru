export function initParticles() {
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

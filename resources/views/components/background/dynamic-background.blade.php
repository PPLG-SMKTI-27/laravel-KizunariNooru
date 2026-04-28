<div class="fixed inset-0 pointer-events-none z-[-1]" id="dynamic-bg-container" style="background: transparent;">
    <canvas id="dynamic-bg-canvas"></canvas>
</div>

<style>
    #dynamic-bg-canvas {
        display: block;
        transition: opacity 1.5s ease-in-out;
    }
</style>

<script>
    (function() {
        const canvas = document.getElementById('dynamic-bg-canvas');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        let width, height;
        let isDark = document.documentElement.classList.contains('dark');
        
        let mouse = { x: -1000, y: -1000 };
        window.addEventListener('mousemove', e => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        // --- RAIN ENGINE DATA ---
        let drops = [];
        const dropCount = 70; 
        const tech = ['Laravel', 'Tailwind', 'CSS', 'PHP', 'Vite', 'Alpine', 'JS', 'SQL'];

        class Drop {
            constructor() { this.init(); }
            init() {
                this.x = Math.random() * width;
                this.y = Math.random() * -2000;
                this.len = 20 + Math.random() * 40;
                this.isText = Math.random() > 0.85;
                if (this.isText) {
                    this.text = tech[Math.floor(Math.random() * tech.length)];
                    this.speed = 2 + Math.random() * 2.5;
                } else {
                    this.speed = 6 + Math.random() * 8;
                }
            }
            update() {
                this.y += this.speed;
                if (this.y > height) { this.init(); this.y = -this.len; }
            }
            draw() {
                const dist = Math.hypot(this.x - mouse.x, this.y - mouse.y);
                const isNear = dist < 150;

                if (this.isText) {
                    const textColor = isNear ? '#67E8F9' : '#22D3EE';
                    ctx.shadowBlur = isNear ? 20 : 10;
                    ctx.shadowColor = textColor;
                    ctx.font = `bold ${isNear ? 17 : 15}px "Outfit", sans-serif`;
                    ctx.fillStyle = textColor;
                    ctx.fillText(this.text, this.x, this.y);
                    ctx.shadowBlur = 0;
                } else {
                    ctx.strokeStyle = isNear ? 'rgba(34, 211, 238, 0.7)' : 'rgba(34, 211, 238, 0.3)';
                    ctx.lineWidth = isNear ? 2 : 1;
                    ctx.beginPath();
                    ctx.moveTo(this.x, this.y);
                    ctx.lineTo(this.x, this.y + this.len + (isNear ? 10 : 0));
                    ctx.stroke();
                }
            }
        }

        // --- WAVE ENGINE DATA ---
        let waves = [];
        class Wave {
            constructor(y, amp, freq, speed, color) {
                this.y = y;
                this.amp = amp;
                this.freq = freq;
                this.speed = speed;
                this.color = color;
                this.offset = Math.random() * 100;
            }
            draw() {
                this.offset += this.speed;
                ctx.fillStyle = this.color;
                ctx.beginPath();
                ctx.moveTo(0, height);
                for (let x = 0; x <= width; x += 10) {
                    // Interaction: waves react to mouse x
                    const distToMouse = Math.abs(x - mouse.x);
                    const mousePower = Math.max(0, (200 - distToMouse) / 200);
                    const interactAmp = this.amp + (mousePower * 30);
                    
                    const y = this.y + Math.sin(x * this.freq + this.offset) * interactAmp;
                    ctx.lineTo(x, y);
                }
                ctx.lineTo(width, height);
                ctx.fill();
            }
        }

        function initEngines() {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;

            drops = [];
            for (let i = 0; i < dropCount; i++) drops.push(new Drop());

            waves = [
                new Wave(height * 0.75, 30, 0.005, 0.02, 'rgba(186, 230, 253, 0.3)'),
                new Wave(height * 0.82, 45, 0.007, 0.015, 'rgba(103, 232, 249, 0.25)'),
                new Wave(height * 0.88, 25, 0.01, 0.025, 'rgba(224, 242, 254, 0.4)')
            ];
        }

        const observer = new MutationObserver(() => {
            isDark = document.documentElement.classList.contains('dark');
        });
        observer.observe(document.documentElement, { attributes: true });

        window.addEventListener('resize', initEngines);
        initEngines();

        function animate() {
            if (isDark) {
                ctx.fillStyle = 'rgba(5, 11, 26, 0.15)';
                ctx.fillRect(0, 0, width, height);
                canvas.style.opacity = '0.45';
                drops.forEach(d => { d.update(); d.draw(); });
            } else {
                ctx.clearRect(0, 0, width, height);
                canvas.style.opacity = '0.6';
                waves.forEach(w => w.draw());
            }
            requestAnimationFrame(animate);
        }

        animate();
    })();
</script>

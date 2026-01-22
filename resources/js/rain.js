const canvas = document.getElementById("rain");
const ctx = canvas.getContext("2d");

const logos = ["JS", "PHP", "HTML", "CSS", "LARAVEL", "TAILWIND"];
let drops = [];

function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
window.addEventListener("resize", resize);
resize();

class Drop {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.speed = 1 + Math.random() * 2;
        this.text = logos[Math.floor(Math.random() * logos.length)];
        this.size = 14 + Math.random() * 10;
    }
    draw() {
        ctx.font = `${this.size}px monospace`;
        ctx.fillStyle = "rgba(56,189,248,0.8)";
        ctx.shadowColor = "#38bdf8";
        ctx.shadowBlur = 20;
        ctx.fillText(this.text, this.x, this.y);
    }
    update() {
        this.y += this.speed;
        if (this.y > canvas.height) {
            this.y = -20;
            this.x = Math.random() * canvas.width;
        }
        this.draw();
    }
}

for (let i = 0; i < 80; i++) {
    drops.push(new Drop());
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drops.forEach(d => d.update());
    requestAnimationFrame(animate);
}
animate();

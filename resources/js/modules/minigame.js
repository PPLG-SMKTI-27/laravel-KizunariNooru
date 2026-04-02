export function initRetroMinigame() {
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
    
    // NOTE: btnGame click is already wired above
    if (btnRestart) btnRestart.addEventListener('click', resetGame);
    if (btnQuit) btnQuit.addEventListener('click', quitGame);

    // ── Mobile Gamepad Touch Controls ──────────────────────────────────────
    function wireGamepadTouch() {
        const gpMap = [
            { id: 'gp-up',     key: 'ArrowUp'    },
            { id: 'gp-down',   key: 'ArrowDown'  },
            { id: 'gp-left',   key: 'ArrowLeft'  },
            { id: 'gp-right',  key: 'ArrowRight' },
            { id: 'gp-attack', key: 'Space'       },
        ];

        const gpKeys = gpMap.map(m => m.key);
        const clearAllGpKeys = () => { gpKeys.forEach(k => { keys[k] = false; }); };

        gpMap.forEach(({ id, key }) => {
            const btn = document.getElementById(id);
            if (!btn) return;

            btn.addEventListener('pointerdown', (e) => {
                e.preventDefault();
                try { btn.setPointerCapture(e.pointerId); } catch(_) {}
                keys[key] = true;
            });
            btn.addEventListener('pointerup', (e) => {
                e.preventDefault();
                keys[key] = false;
            });
            btn.addEventListener('pointercancel', (e) => {
                e.preventDefault();
                keys[key] = false;
            });
            btn.addEventListener('pointerleave', (e) => {
                if (!btn.hasPointerCapture || !btn.hasPointerCapture(e.pointerId)) {
                    keys[key] = false;
                }
            });
            btn.addEventListener('contextmenu', (e) => e.preventDefault());
        });

        window.addEventListener('blur', clearAllGpKeys);
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) clearAllGpKeys();
        });
        window.addEventListener('pointerup',     clearAllGpKeys);
        window.addEventListener('pointercancel', clearAllGpKeys);

        const mobileQuitBtn = document.getElementById('gp-quit-mobile');
        if (mobileQuitBtn) {
            mobileQuitBtn.addEventListener('pointerdown', (e) => {
                e.preventDefault();
                try { mobileQuitBtn.setPointerCapture(e.pointerId); } catch(_) {}
            });
            mobileQuitBtn.addEventListener('pointerup', (e) => {
                e.preventDefault();
                quitGame();
            });
            mobileQuitBtn.addEventListener('contextmenu', (e) => e.preventDefault());
        }

        canvas.addEventListener('touchstart', (e) => {
            e.preventDefault();
        }, { passive: false });
    }
    wireGamepadTouch();
    
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
        if (side === 0) { ex = Math.random() * canvas.width; ey = -10; } 
        else if (side === 1) { ex = Math.random() * canvas.width; ey = canvas.height + 10; } 
        else if (side === 2) { ex = -10; ey = Math.random() * canvas.height; } 
        else { ex = canvas.width + 10; ey = Math.random() * canvas.height; } 
        
        enemies.push({ x: ex, y: ey, size: 8, speed: 40 + (score * 2), hp: 1 });
    }

    function gameLoop(time) {
        if (!isPlaying) return;
        const dt = (time - lastTime) / 1000;
        lastTime = time;
        
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
        
        player.x = Math.max(player.size, Math.min(canvas.width - player.size, player.x));
        player.y = Math.max(player.size, Math.min(canvas.height - player.size, player.y));
        
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
        
        for (let i = bullets.length - 1; i >= 0; i--) {
            let b = bullets[i];
            b.x += b.vx * dt;
            b.y += b.vy * dt;
            b.life -= dt;
            if (b.life <= 0 || b.x < 0 || b.x > canvas.width || b.y < 0 || b.y > canvas.height) {
                bullets.splice(i, 1);
            }
        }
        
        enemySpawnTimer += dt;
        if (enemySpawnTimer > enemySpawnRate) {
            spawnEnemy();
            enemySpawnTimer = 0;
            enemySpawnRate = Math.max(0.2, enemySpawnRate * 0.98); 
        }
        
        for (let i = enemies.length - 1; i >= 0; i--) {
            let e = enemies[i];
            const ex = player.x - e.x;
            const ey = player.y - e.y;
            const emag = Math.sqrt(ex*ex + ey*ey);
            
            if (emag > 0) {
                e.x += (ex/emag) * e.speed * dt;
                e.y += (ey/emag) * e.speed * dt;
            }
            
            if (emag < (player.size + e.size)) {
                player.hp -= 10;
                enemies.splice(i, 1);
                updateUI();
                
                canvas.style.transform = `translate(${(Math.random()-0.5)*10}px, ${(Math.random()-0.5)*10}px)`;
                setTimeout(()=> canvas.style.transform = "none", 50);
                
                if (player.hp <= 0) {
                    isPlaying = false;
                    finalScoreEl.innerText = score.toString().padStart(3, '0');
                    gameOverScreen.classList.remove('hidden');
                    return; 
                }
                continue; 
            }
            
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
        
        ctx.fillStyle = '#0a0f12';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        ctx.strokeStyle = 'rgba(34,211,238,0.05)';
        ctx.lineWidth = 1;
        for(let i=0; i<canvas.width; i+=20) { ctx.beginPath(); ctx.moveTo(i,0); ctx.lineTo(i,canvas.height); ctx.stroke(); }
        for(let i=0; i<canvas.height; i+=20) { ctx.beginPath(); ctx.moveTo(0,i); ctx.lineTo(canvas.width,i); ctx.stroke(); }

        ctx.fillStyle = '#0ff';
        bullets.forEach(b => {
            ctx.shadowBlur = 10;
            ctx.shadowColor = '#0ff';
            ctx.beginPath();
            ctx.arc(b.x, b.y, b.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;
        });
        
        ctx.fillStyle = '#f00';
        enemies.forEach(e => {
            ctx.shadowBlur = 10;
            ctx.shadowColor = '#f00';
            ctx.fillRect(e.x - e.size, e.y - e.size, e.size * 2, e.size * 2);
            
            ctx.fillStyle = '#fff';
            ctx.shadowBlur = 0;
            ctx.fillRect(e.x - 2, e.y - 4, 4, 4);
            ctx.fillStyle = '#f00';
        });
        
        ctx.shadowBlur = 0;
        ctx.fillStyle = '#fff';
        ctx.fillRect(player.x - player.size, player.y - player.size, player.size * 2, player.size * 2);
        
        ctx.fillStyle = '#0ff';
        ctx.fillRect(player.x + (player.facing.x * 6) - 2, player.y + (player.facing.y * 6) - 2, 4, 4);
        
        requestAnimationFrame(gameLoop);
    }
}

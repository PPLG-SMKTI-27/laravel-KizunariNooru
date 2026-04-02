export function initCustomLoaders() {
    // ── 1. LANGUAGE SWITCH LOADER ──────────────────────────────────────────
    const langLoader  = document.getElementById('lang-loader');
    const langLabel   = document.getElementById('lang-loader-label');
    const langTarget  = document.getElementById('lang-loader-target');
    const langProgress = document.getElementById('lang-progress-bar');

    const langEmojis = { en: '🇬🇧', id: '🇮🇩', ja: '🇯🇵' };
    const langNames  = { en: 'English', id: 'Indonesia', ja: '日本語' };

    // Target all language switch links (they contain 'locale' in href and have data-no-swup)
    document.querySelectorAll('a[data-no-swup], a[href*="locale"]').forEach(link => {
        const href = link.getAttribute('href') || '';
        if (!href.includes('locale') && !href.includes('/lang/')) return;

        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Figure out which locale is being switched to
            const localeMatch = href.match(/\/(en|id|ja)$/);
            const locale = localeMatch ? localeMatch[1] : 'en';

            // Update loader UI with target language info
            if (langLabel) langLabel.textContent = langNames[locale] || locale.toUpperCase();
            if (langTarget) {
                const flagEl = langTarget.querySelector('span:first-child');
                if (flagEl) flagEl.textContent = langEmojis[locale] || '🌐';
            }

            // Show loader
            if (langLoader) {
                langLoader.style.display = 'flex';
                // Animate progress bar
                setTimeout(() => { if(langProgress) langProgress.style.width = '100%'; }, 50);
            }

            // Navigate after animation
            setTimeout(() => { window.location.href = href; }, 800);
        });
    });

    // ── 2. DASHBOARD LOADER ────────────────────────────────────────────────
    const dashLoader  = document.getElementById('dash-loader');
    const dashOutput  = document.getElementById('dash-terminal-output');
    const dashTyping  = document.getElementById('dash-typing');
    const dashProgress = document.getElementById('dash-progress');

    const dashLines = [
        { text: '> Initializing secure connection...', delay: 0   },
        { text: '> Verifying user credentials....',    delay: 280 },
        { text: '> Loading control panel modules...',  delay: 580 },
        { text: '> Access granted. Welcome back.',     delay: 900, success: true },
    ];

    function showDashLoader(href) {
        if (!dashLoader) return;

        // Reset state
        if (dashOutput) dashOutput.innerHTML = '';
        if (dashTyping) dashTyping.textContent = '';

        dashLoader.style.display = 'flex';
        if (dashProgress) { dashProgress.style.transition = 'none'; dashProgress.style.width = '0%'; }
        setTimeout(() => { if(dashProgress) { dashProgress.style.transition = 'width 1.1s ease-out'; dashProgress.style.width = '100%'; } }, 50);

        // Print terminal lines one by one
        dashLines.forEach(({ text, delay, success }) => {
            setTimeout(() => {
                if (!dashOutput) return;
                const line = document.createElement('div');
                line.className = 'dash-terminal-line font-mono text-[11px]';
                line.style.color = success ? '#00ff41' : 'rgba(0,255,65,0.5)';
                line.textContent = text;
                dashOutput.appendChild(line);
            }, delay);
        });

        // Typewrite the final command
        const cmd = 'open_dashboard --auth';
        let ci = 0;
        const typeInterval = setInterval(() => {
            if (!dashTyping) { clearInterval(typeInterval); return; }
            if (ci < cmd.length) {
                dashTyping.textContent += cmd[ci++];
            } else {
                clearInterval(typeInterval);
                setTimeout(() => { window.location.href = href; }, 350);
            }
        }, 40);
    }

    // Wire all links pointing to /dashboard
    document.querySelectorAll('a[href*="dashboard"]').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            showDashLoader(link.getAttribute('href'));
        });
    });

    // Also expose globally so it can be triggered manually
    window.showDashLoader = showDashLoader;
}

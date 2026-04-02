export function initThemeSwitcher() {
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
        // Remove old listener if re-initializing
        const newBtn = toggleBtn.cloneNode(true);
        toggleBtn.parentNode.replaceChild(newBtn, toggleBtn);

        newBtn.addEventListener('click', () => {
            const isDark = root.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';
            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }
}

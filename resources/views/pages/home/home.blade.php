@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')
    @include('pages.home.partials.hero')

    @include('pages.home.partials.about-preview')

    @include('pages.home.partials.featured-project')

    @include('pages.home.partials.skills')

    {{-- Section disembunyikan agar Landing Page lebih ringkas --}}
    @include('pages.home.partials.certificates')

    @include('pages.home.partials.services')

    @include('pages.home.partials.contact')
    @include('pages.home.partials.cta')
@endsection

    <script>
    function initHomeScripts() {
        // Typewriter effect
        const texts = ['Laravel Developer', 'Web Developer', 'UI Enthusiast', 'Furina Fan 🌊'];
        let idx = 0, charIdx = 0, deleting = false;
        const typeEl = document.getElementById('typewriter');
        
        let typeTimeout;

        function typeLoop() {
            if (!typeEl) return;
            const current = texts[idx];
            if (!deleting) {
                typeEl.textContent = current.slice(0, ++charIdx);
                if (charIdx === current.length) { deleting = true; typeTimeout = setTimeout(typeLoop, 1800); return; }
            } else {
                typeEl.textContent = current.slice(0, --charIdx);
                if (charIdx === 0) { deleting = false; idx = (idx + 1) % texts.length; }
            }
            typeTimeout = setTimeout(typeLoop, deleting ? 45 : 80);
        }
        if(typeEl) typeLoop();

        // Hero entrance animation
        const tl = gsap.timeline({ delay: 0.1 });
        tl.from('#hero-badge', { y: 20, opacity: 0, duration: 0.7, ease: 'power3.out' })
          .from('#hero-title', { y: 60, opacity: 0, duration: 0.9, ease: 'power4.out' }, '-=0.3')
          .from('[id=hero] p, [id=hero] .flex.flex-wrap.gap-4', { y: 30, opacity: 0, duration: 0.8, ease: 'power3.out', stagger: 0.15 }, '-=0.4')
          .from('#hero-art', { x: 60, opacity: 0, duration: 1.2, ease: 'power4.out' }, '-=0.8');

        // Floating animation for hero art
        gsap.to('#hero-art', {
            y: -18,
            duration: 3.5,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        // Skill bars animation
        gsap.utils.toArray('.skill-fill').forEach(bar => {
            gsap.to(bar, {
                width: bar.dataset.pct + '%',
                duration: 1.5,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: bar,
                    start: 'top 90%',
                }
            });
        });
        
        // Magnetic Hover Effect for Buttons
        gsap.utils.toArray('.magnetic-btn').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                gsap.to(btn, { x: x * 0.3, y: y * 0.3, duration: 0.4, ease: 'power3.out' });
            });
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.3)' });
            });
        });
    }

    // Run on initial load and Swup page transitions
    document.addEventListener('DOMContentLoaded', initHomeScripts);
    document.addEventListener('pageLoaded', initHomeScripts);
    document.addEventListener('preloaderDone', initHomeScripts);
    </script>

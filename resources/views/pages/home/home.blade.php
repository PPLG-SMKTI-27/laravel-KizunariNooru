@extends('layouts.app')
@section('title', 'Portfolio')
@section('content')
    @include('pages.home.partials.hero')

    @include('pages.home.partials.about-preview')

    @include('pages.home.partials.featured-project')

    @include('pages.home.partials.skills')

    @include('pages.home.partials.services')

    @include('pages.home.partials.cta')
@endsection

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Typewriter effect
        const texts = ['Laravel Developer', 'Web Developer', 'UI Enthusiast', 'Furina Fan 🌊'];
        let idx = 0, charIdx = 0, deleting = false;
        const typeEl = document.getElementById('typewriter');

        function typeLoop() {
            const current = texts[idx];
            if (!deleting) {
                typeEl.textContent = current.slice(0, ++charIdx);
                if (charIdx === current.length) { deleting = true; setTimeout(typeLoop, 1800); return; }
            } else {
                typeEl.textContent = current.slice(0, --charIdx);
                if (charIdx === 0) { deleting = false; idx = (idx + 1) % texts.length; }
            }
            setTimeout(typeLoop, deleting ? 45 : 80);
        }
        typeLoop();

        // Hero entrance animation
        document.addEventListener('preloaderDone', () => {
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
        });
    });
    </script>

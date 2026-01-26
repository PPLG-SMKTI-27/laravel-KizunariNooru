@extends('layouts.app')

@section('title', 'FurinaDev | Full Stack Developer Portfolio')

@section('content')
    {{-- Hero Section --}}
    @include('sections.hero')
    
    {{-- About Section --}}
    @include('sections.about')
    
    {{-- Skills Section --}}
    @include('sections.skills')
    
    {{-- Experience Section --}}
    @include('sections.experience')
    
    {{-- Education Section --}}
    @include('sections.education')
    
    {{-- Featured Projects --}}
    @include('sections.featured-projects')
    
    {{-- Contact Section --}}
    @include('sections.contact')
@endsection

@push('scripts')
<script>
    // GSAP animations for home page
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    gsap.to(window, {
                        duration: 1,
                        scrollTo: {
                            y: target,
                            offsetY: 80
                        },
                        ease: "power3.inOut"
                    });
                }
            });
        });
        
        // Active nav link on scroll
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');
        
        window.addEventListener('scroll', () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (window.scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    });
</script>
@endpush
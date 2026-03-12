{{-- ══════════════════════════════════════════════════════
     SERVICES SECTION
══════════════════════════════════════════════════════ --}}
<section id="services" class="py-28 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="gsap-reveal mb-16 text-center">
            <span class="section-label">— Specialized Solutions</span>
            <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Services</span></h2>
            <span class="section-line mx-auto"></span>
        </div>

        <div class="grid md:grid-cols-3 gap-8 gsap-stagger">
            @foreach([
                [
                    'icon'=>'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 
                    'svg'=>'<path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /><path d="M8 8l-2 2 2 2" opacity="0.5"/><path d="M16 12l2-2-2-2" opacity="0.5"/>',
                    'title'=>'Web Development', 
                    'desc'=>'Membangun website yang cepat, responsif, dan aman menggunakan Laravel dan teknologi modern lainnya.'
                ],
                [
                    'icon'=>'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z', 
                    'svg'=>'<path d="M4 5h16v2H4zM4 13h8v6H4zM16 13h4v6h-4z" opacity="0.4"/><path d="M2 3h20v4H2z" stroke-width="2"/><path d="M2 11h11v10H2z" stroke-width="2"/><path d="M15 11h7v10h-7z" stroke-width="2"/>',
                    'title'=>'UI/UX Design', 
                    'desc'=>'Mendesain antarmuka pengguna yang estetik dan fungsional dengan fokus pada pengalaman pengguna yang premium.'
                ],
                [
                    'icon'=>'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 
                    'svg'=>'<path d="M12 2v4m0 12v4M4.22 4.22l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.22 19.78l2.83-2.83m8.48-8.48l2.83-2.83" opacity="0.5"/><circle cx="12" cy="12" r="3" stroke-width="2"/>',
                    'title'=>'Web Maintenance', 
                    'desc'=>'Memastikan website tetap berjalan dengan optimal, melakukan update keamanan, dan mengoptimalkan performa.'
                ]
            ] as $service)
            <div class="card p-8 group hover:border-cyan-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-cyan-400/5 border border-cyan-400/10 flex items-center justify-center text-cyan-400 mb-6 group-hover:bg-cyan-400/10 group-hover:scale-110 transition duration-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $service['svg'] !!}
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-100 mb-3">{{ $service['title'] }}</h3>
                <p class="text-slate-400/80 text-sm leading-relaxed">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

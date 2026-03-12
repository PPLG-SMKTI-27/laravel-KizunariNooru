{{-- ══════════════════════════════════════════════════════
     RESUME SECTION (Experience & Education)
══════════════════════════════════════════════════════ --}}
<section id="resume" class="py-28 relative">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16">
            
            {{-- Experience --}}
            <div class="space-y-10 gsap-reveal">
                <div>
                    <span class="section-label">— Professional Journey</span>
                    <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Experience</span></h2>
                </div>
                
                <div class="space-y-8 relative border-l border-cyan-500/20 pl-8 ml-4">
                    @foreach([
                        ['year'=>'2023 - Present', 'title'=>'Full Stack Web Developer', 'place'=>'Freelance Projects', 'desc'=>'Mengembangkan berbagai website menggunakan Laravel, MySQL, dan Tailwind CSS untuk klien lokal.'],
                        ['year'=>'2024', 'title'=>'Web Development Intern', 'place'=>'Tech Company', 'desc'=>'Berkontribusi dalam pengembangan modul sistem informasi internal perusahaan berbasis PHP native dan Laravel.']
                    ] as $exp)
                    <div class="relative group">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#020617] shadow-[0_0_10px_rgba(6,182,212,0.4)] border-[3px] border-cyan-500 group-hover:scale-125 transition-transform duration-300"></div>
                        <span class="text-[10px] font-bold text-cyan-500/70 uppercase tracking-widest">{{ $exp['year'] }}</span>
                        <h3 class="text-slate-100 font-semibold mt-1">{{ $exp['title'] }}</h3>
                        <p class="text-cyan-200/50 text-xs mt-1 mb-3">{{ $exp['place'] }}</p>
                        <p class="text-slate-300/70 text-sm leading-relaxed">{{ $exp['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Education --}}
            <div class="space-y-10 gsap-reveal" style="transition-delay: 200ms">
                <div>
                    <span class="section-label">— Academic Background</span>
                    <h2 class="section-title text-slate-100">My <span class="text-cyan-grad">Education</span></h2>
                </div>
                
                <div class="space-y-8 relative border-l border-blue-500/20 pl-8 ml-4">
                    @foreach([
                        ['year'=>'2022 - Present', 'title'=>'Pengembangan Perangkat Lunak & GIM', 'place'=>'SMKTI PPLG 27', 'desc'=>'Fokus pada rekayasa perangkat lunak, algoritma, dan pengembangan aplikasi web modern.'],
                        ['year'=>'2019 - 2022', 'title'=>'Junior High School', 'place'=>'Local School', 'desc'=>'Mulai mengenal dasar-dasar pemrograman dan logika komputer.']
                    ] as $edu)
                    <div class="relative group">
                        <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#020617] shadow-[0_0_10px_rgba(59,130,246,0.4)] border-[3px] border-blue-500 group-hover:scale-125 transition-transform duration-300"></div>
                        <span class="text-[10px] font-bold text-blue-400/70 uppercase tracking-widest">{{ $edu['year'] }}</span>
                        <h3 class="text-slate-100 font-semibold mt-1">{{ $edu['title'] }}</h3>
                        <p class="text-blue-200/50 text-xs mt-1 mb-3">{{ $edu['place'] }}</p>
                        <p class="text-slate-300/70 text-sm leading-relaxed">{{ $edu['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

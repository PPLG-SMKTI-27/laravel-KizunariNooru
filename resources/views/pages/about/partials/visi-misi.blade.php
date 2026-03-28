<section id="visi-misi" class="relative min-h-screen flex items-center py-20 overflow-hidden">

    <style>
        @keyframes scan-line {
            0% { transform: translateY(-100%); opacity: 0; }
            10% { opacity: 0.5; }
            90% { opacity: 0.5; }
            100% { transform: translateY(100%); opacity: 0; }
        }
        .matrix-scanner {
            height: 20%;
            background: linear-gradient(to bottom,
                transparent,
                rgba(34, 211, 238, 0.05) 50%,
                rgba(34, 211, 238, 0.2) 95%,
                rgba(34, 211, 238, 0.5) 100%
            );
            box-shadow: 0 4px 15px -2px rgba(34, 211, 238, 0.3);
            animation: scan-line 4s linear infinite;
        }
    </style>

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-linear-to-b from-cyan-500/5 via-transparent to-blue-500/5 opacity-40"></div>
        <div class="absolute inset-0 opacity-[0.03] mix-blend-overlay" style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png');"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(34,211,238,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,0.1) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, rgba(34,211,238,0.4) 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="absolute top-0 left-1/4 w-px h-64 bg-linear-to-b from-transparent via-cyan-500/20 to-transparent opacity-20 hidden lg:block"></div>
        <div class="absolute top-1/2 left-1/3 w-px h-48 bg-linear-to-b from-transparent via-blue-500/20 to-transparent opacity-20 hidden lg:block"></div>
        <div class="absolute bottom-0 right-1/4 w-px h-80 bg-linear-to-b from-transparent via-cyan-500/20 to-transparent opacity-20 hidden lg:block"></div>

        <div class="absolute top-20 left-10 text-[8px] font-mono text-cyan-500/10 rotate-90 uppercase tracking-widest hidden xl:block">010101 // MATRIX_STABLE</div>
        <div class="absolute bottom-20 right-10 text-[8px] font-mono text-blue-500/10 -rotate-90 uppercase tracking-widest hidden xl:block">SYSTEM_CORE // 0xFF2A</div>
    </div>

    <div class="absolute top-8 left-8 w-20 h-20 border-t border-l border-cyan-500/10 pointer-events-none"></div>
    <div class="absolute bottom-8 right-8 w-20 h-20 border-b border-r border-blue-500/10 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10 w-full">
        <div class="grid lg:grid-cols-12 gap-12 items-stretch">

            <div class="lg:col-span-5 flex flex-col gsap-reveal">
                <div class="group relative flex-1">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-cyan-500/5 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition duration-700"></div>

                    <div class="absolute -right-12 top-1/2 w-12 h-px bg-linear-to-r from-cyan-500/50 to-blue-500/50 hidden lg:block">
                        <div class="absolute right-0 -top-1 w-2 h-2 rounded-full bg-blue-400 shadow-[0_0_8px_rgba(96,165,250,0.8)]"></div>
                    </div>

                    <div class="absolute -inset-px bg-linear-to-br from-emerald-500/30 via-cyan-500/20 to-blue-600/30 rounded-3xl blur-sm opacity-50 group-hover:opacity-100 transition duration-500"></div>

                    <div class="relative h-full bg-[#020814]/90 backdrop-blur-xl border border-white/5 rounded-3xl p-8 md:p-10 flex flex-col justify-center overflow-hidden">
                        <div class="absolute inset-0 pointer-events-none z-20 overflow-hidden">
                            <div class="matrix-scanner w-full"></div>
                        </div>
                        <div class="flex items-center justify-between mb-8">
                            <span class="text-[10px] font-mono text-emerald-400/60 tracking-[0.4em] uppercase">// CORE_OBJECTIVE</span>
                            <span class="text-[9px] font-mono text-cyan-400/30 uppercase">MAIN DIRECTIVE</span>
                        </div>

                        <div class="relative mb-10">
                            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight font-cinzel tracking-wider">
                                <span class="text-6xl mt-1 text-cyan-400 select-none drop-shadow-[0_0_15px_rgba(34,211,238,0.3)]">V</span>ISI
                            </h2>
                            <div class="clear-both w-12 h-1 bg-linear-to-r from-emerald-500 to-transparent rounded-full"></div>
                        </div>

                        <p class="text-lg md:text-xl text-slate-200 font-light leading-relaxed italic border-l-2 border-emerald-500/30 pl-6">
                            Menjadi software engineer yang mampu membangun sistem cerdas melalui integrasi web, artificial intelligence, dan robotics, serta berkontribusi di industri teknologi global, khususnya di Jepang.
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 flex flex-col gap-6 gsap-reveal" style="transition-delay: 200ms">

                <div class="relative mb-2 px-2">
                    <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight font-cinzel tracking-wider">
                        <span class="text-6xl mt-1 text-blue-400 select-none drop-shadow-[0_0_15px_rgba(59,130,246,0.3)]">M</span>ISI
                    </h2>
                    <div class="clear-both w-12 h-1 bg-linear-to-r from-blue-500 to-transparent rounded-full mt-6"></div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4 flex-1">
                    @php
                        $missions = [
                            ['num' => '01', 'title' => 'Practical Engineering', 'desc' => 'Mengembangkan keterampilan di bidang software engineering melalui proyek nyata dan pengalaman praktis.'],
                            ['num' => '02', 'title' => 'AI & Robotics', 'desc' => 'Mempelajari dan mengimplementasikan artificial intelligence serta robotics secara bertahap.'],
                            ['num' => '03', 'title' => 'Global Expansion', 'desc' => 'Mempersiapkan diri untuk melanjutkan pendidikan dan karir di Jepang melalui peningkatan kemampuan teknis dan akademik.'],
                            ['num' => '04', 'title' => 'Scalable Systems', 'desc' => 'Membangun sistem yang efisien, scalable, dan sesuai dengan standar industri global.']
                        ];
                    @endphp

                    @foreach($missions as $idx => $m)
                    <div class="group relative">
                        <div class="absolute -inset-px bg-linear-to-br from-blue-500/20 to-transparent rounded-2xl blur-sm opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        <div class="relative h-full bg-[#020814]/60 backdrop-blur-lg border border-cyan-500/10 group-hover:border-cyan-400/40 rounded-2xl p-6 transition-all duration-300">
                            <div class="absolute -left-2 top-1/2 -translate-y-1/2 w-4 h-px bg-cyan-500/30 hidden sm:block"></div>

                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-cyan-400 font-mono text-xs">{{ $m['num'] }} >></span>
                                <h3 class="text-xs font-bold text-white uppercase tracking-widest">{{ $m['title'] }}</h3>
                            </div>
                            <p class="text-slate-400 text-sm leading-relaxed group-hover:text-cyan-100/90 transition-colors">
                                {{ $m['desc'] }}
                            </p>

                            <div class="absolute top-0 right-0 p-1.5 opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="w-2 h-2 border-t border-r border-cyan-400/50"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-auto p-4 rounded-2xl bg-[#0a1122] border border-cyan-500/20 shadow-[0_0_25px_rgba(34,211,238,0.1)] flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="px-2 py-1 rounded bg-blue-500/10 border border-blue-500/20">
                            <span class="text-[9px] font-mono text-blue-400 uppercase tracking-tighter">Mission System</span>
                        </div>
                        <div class="h-4 w-px bg-white/10"></div>
                        <div class="flex gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-cyan-500 animate-[pulse_2s_infinite]"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-cyan-500/30"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-cyan-500/30"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="about" class="py-28 relative overflow-hidden">

    <div class="absolute top-0 right-0 w-96 h-96 pointer-events-none"
         style="background:radial-gradient(circle,rgba(34,211,238,0.06) 0%,transparent 70%)"></div>

    <div class="max-w-6xl mx-auto px-6">

        <div class="gsap-reveal mb-16">
            <span class="section-label">Unveiling the developer</span>
            <h2 class="section-title text-slate-100">About <span class="text-cyan-grad">Me</span></h2>
            <span class="section-line"></span>
        </div>

        <div class="grid lg:grid-cols-5 gap-12 items-start">
            <div class="lg:col-span-3 space-y-6 gsap-reveal">
                <p class="text-slate-300/90 text-base leading-relaxed">
                    Halo! Saya <span class="text-cyan-400 font-semibold">Fahri Noor Royyan</span>, siswa
                    <span class="text-cyan-400">SMK TI</span> dengan minat utama pada bidang
                    <span class="text-slate-100 font-medium">software engineering</span>,
                    robotics, dan artificial intelligence. Saya tertarik dalam membangun sistem
                    yang mampu berpikir, beradaptasi, dan berinteraksi dengan dunia nyata.
                </p>

                <p class="text-blue-100/65 text-base leading-relaxed">
                    Seperti Furina dari Fontaine, saya percaya bahwa sebuah sistem tidak hanya harus
                    <em class="text-cyan-200 not-italic">berfungsi dengan baik</em>, tetapi juga
                    <em class="text-cyan-200 not-italic">dirancang dengan arsitektur yang kuat</em>,
                    efisien, dan scalable. Dengan pendekatan problem solving dan pola pikir sistematis,
                    saya menggabungkan logika pemrograman dengan konsep kecerdasan buatan dan otomasi.
                </p>

                <p class="text-blue-100/65 text-base leading-relaxed">
                    Saat ini, saya mengembangkan proyek berbasis web dan mulai mengeksplorasi
                    integrasi antara software, AI, dan sistem robotic untuk menciptakan solusi
                    yang lebih cerdas dan inovatif.
                </p>

                <div class="flex flex-wrap gap-2 pt-2 gsap-stagger">
                    @foreach(['Laravel','PHP','MySQL','Tailwind CSS','JavaScript','Alpine.js','Blade','Git','HTML5','CSS3'] as $t)
                        <span class="tag">{{ $t }}</span>
                    @endforeach
                </div>

                <div class="card p-5 border-l-2 border-l-cyan-400/60 rounded-l-none mt-6">
                    <p class="font-playfair text-blue-100/70 italic text-sm leading-relaxed">
                        "The most precise mechanism is useless without the soul to operate it.
                        Code is not just logic it is art."
                    </p>
                    <p class="text-cyan-400/50 text-xs mt-2 tracking-widest">— Inspired by Furina, Archon of Justice</p>
                </div>
            </div>

            <div class="lg:col-span-2 gsap-stagger">

                <div class="grid grid-cols-2 gap-4 mb-4">
                    @foreach([
                        ['value'=>'2','suf'=>'+','label'=>'Years of Learning','svg'=>'<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>','color'=>'from-cyan-400 to-blue-500'],
                        ['value'=>$projectCount,'suf'=>'+','label'=>'Projects Built','svg'=>'<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>','color'=>'from-gold to-amber-400'],
                        ['value'=>$skills->count(),'suf'=>'+','label'=>'Skills Mastered','svg'=>'<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>','color'=>'from-cyan-400 to-teal-400'],
                        ['value'=>'100','suf'=>'%','label'=>'Passion','svg'=>'<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>','color'=>'from-blue-400 to-indigo-500'],
                    ] as $s)
                    <div class="card p-5 text-center group">
                        <div class="flex justify-center mb-3">
                            <div class="w-10 h-10 rounded-xl bg-cyan-400/5 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-400/10 group-hover:scale-110 transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $s['svg'] !!}</svg>
                            </div>
                        </div>
                        <div class="font-cinzel text-2xl font-bold text-cyan-grad mb-0.5">
                            <span data-count="{{ $s['value'] }}" data-suffix="{{ $s['suf'] }}">{{ $s['value'] }}{{ $s['suf'] }}</span>
                        </div>
                        <div class="text-blue-300/50 text-xs">{{ $s['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                <div class="card p-5 space-y-3">
                    @foreach([
                        ['<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>','School','SMKTI Airlangga PPLG'],
                        ['<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>','Location','Samarinda, Kaltim, Indonesia'],
                        ['<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>','Focus','Software Engineering'],
                        ['<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m-6 4h6m1-4h4.83a2 2 0 011.923 2.535l-1.28 5.12a2 2 0 01-1.923 1.465H2.45a2 2 0 01-1.923-2.535l1.28-5.12A2 2 0 013.73 7H8.5V4a2 2 0 012-2h3a2 2 0 012 2v1z"/>','Artist','Furina · Fontaine'],
                    ] as $info)
                    <div class="flex items-center gap-3 text-sm">
                        <div class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-cyan-400/70">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $info[0] !!}</svg>
                        </div>
                        <span class="text-blue-300/45 w-20">{{ $info[1] }}</span>
                        <span class="text-blue-100/80 font-medium">{{ $info[2] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

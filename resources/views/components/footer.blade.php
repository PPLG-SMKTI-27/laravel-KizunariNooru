{{-- ═══════════════════════════════════════
    FURINA FOOTER — elegant & minimalist
═══════════════════════════════════════ --}}
<footer class="py-16 relative border-t border-cyan-400/10">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            
            {{-- Branding --}}
            <div class="md:col-span-2 space-y-6">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center border border-cyan-400/30">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <span class="font-cinzel text-xl font-bold text-white tracking-wide">FNR<span class="text-cyan-400">.</span>dev</span>
                </a>
                <p class="text-blue-200/50 text-sm leading-relaxed max-w-sm">
                    Membangun jembatan antara imajinasi dan realitas digital. Fokus pada performa, estetika, dan pengalaman pengguna yang luar biasa.
                </p>
                <div class="flex gap-4">
                    @foreach([
                        ['icon'=>'github', 'url'=>'https://github.com/'],
                        ['icon'=>'instagram', 'url'=>'https://instagram.com/'],
                        ['icon'=>'linkedin', 'url'=>'https://linkedin.com/']
                    ] as $social)
                    <a href="{{ $social['url'] }}" class="w-10 h-10 rounded-xl bg-white/5 border border-white/5 flex items-center justify-center text-blue-300/40 hover:text-cyan-400 hover:border-cyan-400/30 hover:bg-cyan-400/5 transition duration-300">
                         {{-- Simple SVG identifiers for now --}}
                         <span class="text-xs uppercase font-bold tracking-tighter">{{ substr($social['icon'], 0, 2) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="font-cinzel text-xs font-bold text-cyan-400/60 uppercase tracking-widest mb-6">Navigation</h4>
                <ul class="space-y-3">
                    @foreach(['About'=>'/#about', 'Skills'=>'/#skills', 'Projects'=>'/#projects', 'Services'=>'/#services'] as $label => $link)
                    <li>
                        <a href="{{ $link }}" class="text-blue-200/60 hover:text-cyan-300 transition text-sm">
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Fontaine Quote --}}
            <div class="relative">
                <div class="absolute -top-4 -left-4 text-4xl text-cyan-400/10 font-serif">"</div>
                <p class="text-blue-200/40 italic text-sm leading-relaxed pt-2">
                    "Under the gaze of Justice, every line of code shall be judged by its elegance."
                </p>
                <p class="text-[10px] text-cyan-400/20 uppercase tracking-[0.2em] mt-4">— Court of Fontaine</p>
            </div>

        </div>

        <div class="pt-8 border-t border-cyan-400/5 flex flex-col md:flex-row justify-between items-center gap-4 text-[11px] text-blue-300/30 uppercase tracking-[0.2em]">
            <p>&copy; {{ date('Y') }} Fahri Noor Royyan. All rights preserved.</p>
            <p>Made with 🌊 & Laravel</p>
        </div>
    </div>
</footer>
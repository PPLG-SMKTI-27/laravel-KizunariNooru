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
                        ['title'=>'GitHub', 'url'=>'https://github.com/', 'svg'=>'<path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.254-2.815 1.233-3.223-.114-.303-.533-1.527.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12"/>'],
                        ['title'=>'Instagram', 'url'=>'https://instagram.com/', 'svg'=>'<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>'],
                        ['title'=>'LinkedIn', 'url'=>'https://linkedin.com/', 'svg'=>'<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>']
                    ] as $social)
                    <a href="{{ $social['url'] }}" title="{{ $social['title'] }}" class="w-10 h-10 rounded-xl bg-white/5 border border-white/5 flex items-center justify-center text-blue-300/40 hover:text-cyan-400 hover:border-cyan-400/30 hover:bg-cyan-400/5 transition duration-300">
                         <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">{!! $social['svg'] !!}</svg>
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
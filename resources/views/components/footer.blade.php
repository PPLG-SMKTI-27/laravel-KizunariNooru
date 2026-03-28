{{-- ══════════════════════════════════════════════════════
     FURINA FOOTER — LIQUID GLASS REDESIGN
══════════════════════════════════════════════════════ --}}
<footer class="relative py-20 overflow-hidden bg-bg border-t border-white/5 transition-colors duration-500">

    {{-- Fluid Background Decorations --}}
    <div class="absolute inset-0 pointer-events-none opacity-40">
        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-primary/10 blur-[100px] rounded-full"></div>
        <div class="absolute top-0 right-1/4 w-64 h-64 bg-primary-2/5 blur-[80px] rounded-full"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        {{-- Main Glass Container --}}
        <div class="bg-surface/20 backdrop-blur-2xl border border-white/10 rounded-[3rem] p-10 md:p-16 shadow-2xl overflow-hidden relative group">

            {{-- Decorative Refraction --}}
            <div class="absolute -top-20 -right-20 w-40 h-40 bg-primary/10 blur-[60px] rounded-full group-hover:scale-150 transition-transform duration-1000"></div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 relative z-10">

                {{-- Branding Section --}}
                <div class="md:col-span-2 space-y-8">
                    <a href="/" class="inline-flex items-center gap-4 group/logo">
                        <div class="w-14 h-14 rounded-2xl bg-bg/40 border border-white/10 flex items-center justify-center text-primary shadow-inner group-hover/logo:scale-110 group-hover/logo:rotate-3 transition-all duration-500">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block font-cinzel text-2xl font-black text-text tracking-tighter uppercase">
                                FNR<span class="text-primary italic">.</span>DEV
                            </span>
                            <span class="text-[9px] font-mono text-primary/60 uppercase tracking-[0.4em]">Digital Craftsman</span>
                        </div>
                    </a>

                    <p class="text-muted text-sm leading-relaxed max-w-sm opacity-80 font-medium">
                        Membangun jembatan antara imajinasi dan realitas digital. Fokus pada performa, estetika, dan pengalaman pengguna yang sehalus kaca.
                    </p>

                    {{-- Social Liquid Icons --}}
                    <div class="flex gap-4">
                        @foreach([
                            ['title'=>'GitHub', 'url'=>'#', 'svg'=>'M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.254-2.815 1.233-3.223-.114-.303-.533-1.527.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12'],
                            ['title'=>'Instagram', 'url'=>'#', 'svg'=>'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'],
                        ] as $social)
                        <a href="{{ $social['url'] }}"
                           class="w-12 h-12 rounded-xl bg-bg/20 border border-white/5 flex items-center justify-center text-muted hover:text-primary hover:border-primary/40 hover:bg-primary/5 transition-all duration-300 backdrop-blur-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $social['svg'] }}"/></svg>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="md:pl-10">
                    <h4 class="font-bold text-xs text-text uppercase tracking-[0.3em] mb-8">Navigation</h4>
                    <ul class="space-y-4">
                        @foreach(['About'=>'/#about', 'Skills'=>'/#skills', 'Projects'=>'/#projects', 'Services'=>'/#services'] as $label => $link)
                        <li>
                            <a href="{{ $link }}" class="text-muted hover:text-primary transition-colors text-sm font-medium flex items-center gap-2 group/link">
                                <span class="w-0 h-[1px] bg-primary group-hover/link:w-3 transition-all"></span>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Fontaine Quote --}}
                <div class="relative bg-primary/5 rounded-3xl p-8 border border-white/5 md:col-span-1">
                    <div class="absolute -top-3 left-6 px-3 bg-primary text-surface text-[10px] font-bold tracking-widest uppercase rounded-full">Judge</div>
                    <p class="text-text/70 italic text-sm leading-relaxed pt-2 opacity-80">
                        "Under the gaze of Justice, every line of code shall be judged by its elegance."
                    </p>
                    <p class="text-[9px] text-primary font-bold uppercase tracking-[0.2em] mt-6">— Court of Fontaine</p>
                </div>

            </div>

            {{-- Bottom Divider & Copyright --}}
            <div class="mt-16 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
                <div class="flex items-center gap-4 text-[10px] font-mono text-muted uppercase tracking-widest">
                    <p>&copy; {{ date('Y') }} Fahri Noor Royyan</p>
                    <span class="w-1 h-1 rounded-full bg-primary"></span>
                    <p>All Rights Reserved</p>
                </div>

                <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-bg/40 border border-white/5 text-[10px] font-mono text-primary/60">
                    <span class="w-2 h-2 rounded-full bg-success animate-pulse"></span>
                    SYSTEM_STABLE: 100%
                </div>
            </div>
        </div>

        {{-- Final Footer Note --}}
        <div class="mt-12 text-center">
            <p class="text-[10px] text-muted/30 uppercase tracking-[0.5em]">Handcrafted with 🌊 & Laravel</p>
        </div>
    </div>
</footer>

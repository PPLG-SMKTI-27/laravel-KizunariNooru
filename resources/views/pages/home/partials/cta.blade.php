{{-- ══════════════════════════════════════════════════════
     CTA SECTION — LIQUID GLASS (MULTI-THEME OPTIMIZED)
══════════════════════════════════════════════════════ --}}
<section id="cta" class="py-32 relative overflow-hidden bg-bg transition-colors duration-500">

    {{-- Background Fluid Orbs --}}
    <div class="absolute inset-0 pointer-events-none">
        {{-- Primary Orb --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[800px] h-[400px] bg-primary/10 blur-[100px] rounded-[100%] rotate-6 animate-pulse"></div>
        {{-- Secondary Orb --}}
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-2/10 blur-[80px] rounded-full opacity-60"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 relative z-10">
        {{-- The Glass Vessel --}}
        {{-- Border menggunakan opacity yang menyesuaikan dengan warna teks agar tetap terlihat di kedua tema --}}
        <div class="relative group p-[1px] bg-gradient-to-br from-text/20 via-text/5 to-transparent rounded-[3rem] md:rounded-[4rem] shadow-2xl transition-all duration-500">

            {{-- Main Glass Body --}}
            <div class="absolute inset-0 bg-surface/40 backdrop-blur-[30px] rounded-[2.9rem] md:rounded-[3.9rem] border border-white/10"></div>

            <div class="relative px-8 py-20 md:px-16 md:py-24 flex flex-col items-center text-center overflow-hidden rounded-[2.8rem] md:rounded-[3.8rem]">

                {{-- Refraction Glow (Interactive) --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/15 blur-[80px] rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-125 transition-transform duration-700 opacity-50"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-primary-2/15 blur-[60px] rounded-full translate-y-1/2 -translate-x-1/2 opacity-50"></div>

                {{-- Content Container --}}
                <div class="gsap-reveal relative z-10 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 mb-8 backdrop-blur-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
                        <span class="text-[10px] font-bold text-primary uppercase tracking-[0.4em]">Project Inquiry</span>
                    </div>

                    <h2 class="text-4xl md:text-6xl font-black text-text tracking-tight leading-tight mb-8">
                        Let's Fluidize Your <br>
                        <span class="bg-gradient-to-r from-primary via-primary-2 to-primary bg-clip-text text-transparent italic">Digital Vision</span>
                    </h2>

                    <p class="text-muted text-lg md:text-xl leading-relaxed mb-12 max-w-lg mx-auto">
                        Siap mengubah ide kompleks menjadi solusi digital yang jernih dan berperforma tinggi?
                    </p>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                        {{-- Primary Button --}}
                        <a href="mailto:fahri@example.com"
                           class="relative w-full sm:w-auto px-10 py-5 group/btn overflow-hidden rounded-2xl bg-primary text-surface font-bold tracking-widest uppercase text-xs transition-all duration-500 hover:shadow-[0_15px_30px_-5px_var(--color-primary)] hover:-translate-y-1">
                            <span class="relative z-10">Start Project Now</span>
                            {{-- Liquid Shine Effect --}}
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-1000"></div>
                        </a>

                        {{-- Secondary Button --}}
                        <a href="#contact"
                           class="w-full sm:w-auto px-10 py-5 rounded-2xl bg-surface/50 border border-border text-text font-bold tracking-widest uppercase text-xs backdrop-blur-md hover:bg-surface hover:border-primary/50 transition-all duration-300">
                            Book a Call
                        </a>
                    </div>
                </div>

                {{-- Bottom Meta Info --}}
                <div class="mt-16 flex flex-wrap justify-center items-center gap-x-8 gap-y-4 opacity-50">
                    <div class="flex items-center gap-2">
                        <span class="text-[9px] font-mono uppercase tracking-widest text-text">System_Status:</span>
                        <span class="text-[9px] font-mono text-primary font-bold">READY</span>
                    </div>
                    <div class="hidden sm:block w-1 h-1 rounded-full bg-muted"></div>
                    <div class="flex items-center gap-2">
                        <span class="text-[9px] font-mono uppercase tracking-widest text-text">Local_Time:</span>
                        <span class="text-[9px] font-mono text-text font-bold uppercase" id="cta-clock">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Simple script to keep the "Local_Time" updated
    function updateCTATime() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });
        const element = document.getElementById('cta-clock');
        if(element) element.innerText = timeStr + ' UTC+8';
    }
    setInterval(updateCTATime, 1000);
    updateCTATime();
</script>

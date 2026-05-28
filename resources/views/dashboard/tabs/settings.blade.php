{{-- SECTION: SETTINGS --}}
<div x-show="tab === 'settings'" x-cloak class="space-y-6">
    <form method="POST" action="{{ route('settings.update') }}" class="space-y-8">
        @csrf

        {{-- Hero Section --}}
        <div class="card p-8">
            <h3 class="font-display text-base font-bold text-white mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-cyan-400/10 border border-cyan-400/20 flex items-center justify-center text-cyan-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </span>
                Hero Section
            </h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="setting-hero-name" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">Full Name</label>
                    <input type="text" id="setting-hero-name" name="hero_name" value="{{ $settings['hero_name'] ?? '' }}" class="input-furina w-full">
                </div>
                <div class="md:col-span-2">
                    <label for="setting-footer-bio" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">Footer Branding Bio</label>
                    <textarea id="setting-footer-bio" name="footer_bio" rows="2" class="input-furina w-full" placeholder="Membangun jembatan antara imajinasi dan realitas digital...">{{ $settings['footer_bio'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <div class="card p-8">
            <h3 class="font-display text-base font-bold text-white mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-blue-400/10 border border-blue-400/20 flex items-center justify-center text-blue-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </span>
                Hero Stats (4 Counters)
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([1,2,3,4] as $i)
                <div class="space-y-3 p-4 rounded-2xl bg-white/2 border border-white/5">
                    <label for="setting-stat-{{ $i }}-value" class="text-[9px] font-bold text-cyan-400/40 uppercase tracking-widest block">Stat {{ $i }}</label>
                    <input type="text" id="setting-stat-{{ $i }}-value" name="stat_{{ $i }}_value" value="{{ $settings['stat_'.$i.'_value'] ?? '' }}" placeholder="2+" class="input-furina w-full text-center font-bold">
                </div>
                @endforeach
            </div>
        </div>

        {{-- Contact Info --}}
        <div class="card p-8">
            <h3 class="font-display text-base font-bold text-white mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center text-emerald-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                Contact Information
            </h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="setting-contact-email" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">Email Address</label>
                    <input type="email" id="setting-contact-email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="input-furina w-full">
                </div>
                <div>
                    <label for="setting-contact-location" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">Location</label>
                    <input type="text" id="setting-contact-location" name="contact_location" value="{{ $settings['contact_location'] ?? '' }}" class="input-furina w-full">
                </div>
            </div>
        </div>

        {{-- Social Links --}}
        <div class="card p-8">
            <h3 class="font-display text-base font-bold text-white mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-rose-400/10 border border-rose-400/20 flex items-center justify-center text-rose-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </span>
                Social Links
            </h3>
            <div class="grid md:grid-cols-4 gap-6">
                <div>
                    <label for="setting-social-github" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">GitHub URL</label>
                    <input type="url" id="setting-social-github" name="social_github" value="{{ $settings['social_github'] ?? '' }}" placeholder="https://github.com/..." class="input-furina w-full">
                </div>
                <div>
                    <label for="setting-social-linkedin" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">LinkedIn URL</label>
                    <input type="url" id="setting-social-linkedin" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" placeholder="https://linkedin.com/..." class="input-furina w-full">
                </div>
                <div>
                    <label for="setting-social-instagram" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">Instagram URL</label>
                    <input type="url" id="setting-social-instagram" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" placeholder="https://instagram.com/..." class="input-furina w-full">
                </div>
                <div>
                    <label for="setting-social-whatsapp" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-2">WhatsApp URL</label>
                    <input type="url" id="setting-social-whatsapp" name="social_whatsapp" value="{{ $settings['social_whatsapp'] ?? '' }}" placeholder="https://wa.me/..." class="input-furina w-full">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn-primary px-10 py-3">
                Save All Settings
            </button>
        </div>
    </form>
</div>

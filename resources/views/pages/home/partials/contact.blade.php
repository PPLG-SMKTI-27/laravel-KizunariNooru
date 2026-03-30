{{-- ══════════════════════════════════════════════════════
     CONTACT SECTION — PROFESSIONAL REDESIGN
══════════════════════════════════════════════════════ --}}
<section id="contact" class="py-32 relative overflow-hidden bg-bg">

    {{-- Subtle Background Elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-40">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary-2/5 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        
        <div class="grid lg:grid-cols-5 gap-16">
            
            {{-- Left Side: Contact Info --}}
            <div class="lg:col-span-2 space-y-10 gsap-reveal">
                
                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-text font-cinzel mb-4">
                        {{ __('Let\'s Talk') }} <span class="bg-gradient-to-r from-primary to-primary-2 bg-clip-text text-transparent italic">{{ __('Business') }}</span>
                    </h2>
                    <p class="text-muted leading-relaxed font-light">
                        {{ __('contact_description') }}
                    </p>
                </div>

                {{-- Availability Badge --}}
                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-success/10 border border-success/20 shadow-sm backdrop-blur-md">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-success"></span>
                    </span>
                    <span class="text-xs font-bold text-success uppercase tracking-widest">{{ __('Available for Work') }}</span>
                </div>

                {{-- Info Cards --}}
                <div class="space-y-4">
                    {{-- Email --}}
                    <a href="mailto:{{ $settings['contact_email'] ?? 'hello@example.com' }}" class="group flex items-center gap-6 p-5 rounded-[2rem] bg-surface/50 backdrop-blur-md border border-border hover:border-primary/50 transition-all shadow-md">
                        <div class="w-12 h-12 rounded-xl bg-bg border border-border flex items-center justify-center text-primary group-hover:scale-110 transition-transform shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-muted font-bold mb-1">{{ __('Email') }}</span>
                            <span class="text-text font-medium group-hover:text-primary transition-colors">{{ $settings['contact_email'] ?? 'hello@example.com' }}</span>
                        </div>
                    </a>

                    {{-- Location --}}
                    <div class="flex items-center gap-6 p-5 rounded-[2rem] bg-surface/50 backdrop-blur-md border border-border shadow-md">
                        <div class="w-12 h-12 rounded-xl bg-bg border border-border flex items-center justify-center text-primary shadow-inner">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-muted font-bold mb-1">{{ __('Location') }}</span>
                            <span class="text-text font-medium">{{ $settings['contact_location'] ?? 'Jakarta, Indonesia (GMT+7)' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Socials --}}
                <div class="pt-6">
                    <span class="block text-[10px] uppercase tracking-widest text-muted font-bold mb-4">{{ __('Connect on Social') }}</span>
                    <div class="flex gap-3">
                        @if(!empty($settings['social_github']))
                        <a href="{{ $settings['social_github'] }}" target="_blank" aria-label="GitHub Profile" class="w-12 h-12 rounded-xl bg-surface/50 border border-border flex items-center justify-center text-muted hover:text-primary hover:border-primary/50 transition-all hover:-translate-y-1 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['social_linkedin']))
                        <a href="{{ $settings['social_linkedin'] }}" target="_blank" aria-label="LinkedIn Profile" class="w-12 h-12 rounded-xl bg-surface/50 border border-border flex items-center justify-center text-muted hover:text-primary hover:border-primary/50 transition-all hover:-translate-y-1 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2zM4 2a2 2 0 110 4 2 2 0 010-4z"/></svg>
                        </a>
                        @endif
                        @if(!empty($settings['social_instagram']))
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" aria-label="Instagram Profile" class="w-12 h-12 rounded-xl bg-surface/50 border border-border flex items-center justify-center text-muted hover:text-primary hover:border-primary/50 transition-all hover:-translate-y-1 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849s-.011 3.585-.069 4.85c-.148 3.217-1.659 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.849-.07c-3.264-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.849s.011-3.584.069-4.849c.149-3.264 1.658-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.338-.2 6.78-2.617 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.338-2.617-6.78-6.98-6.98-1.28-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm6.406-11.845c0 .796-.646 1.442-1.442 1.442s-1.442-.646-1.442-1.442.646-1.442 1.442-1.442 1.442.646 1.442 1.442z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

            </div>

            {{-- Right Side: Contact Form --}}
            <div class="lg:col-span-3 gsap-reveal">
                
                <div class="bg-surface/60 backdrop-blur-2xl border border-white/10 p-8 md:p-12 rounded-[3.5rem] shadow-2xl relative overflow-hidden">
                    
                    <div class="absolute -top-32 -right-32 w-64 h-64 bg-primary/10 blur-[80px] rounded-full"></div>

                    <form action="{{ route('contact.store') }}" method="POST" class="relative z-10 space-y-6" id="ajax-contact-form">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            {{-- Name --}}
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-muted uppercase tracking-widest pl-2 block">{{ __('Your Name') }}</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-muted">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                    <input type="text" name="name" required class="w-full pl-12 pr-4 py-4 bg-bg/50 border border-border text-text text-sm rounded-2xl focus:border-primary/50 focus:ring-1 focus:ring-primary/50 placeholder-muted/50 transition-all outline-none" placeholder="{{ __('John Doe') }}">
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-muted uppercase tracking-widest pl-2 block">{{ __('Email Address') }}</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-muted">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <input type="email" name="email" required class="w-full pl-12 pr-4 py-4 bg-bg/50 border border-border text-text text-sm rounded-2xl focus:border-primary/50 focus:ring-1 focus:ring-primary/50 placeholder-muted/50 transition-all outline-none" placeholder="{{ __('john@example.com') }}">
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            {{-- Subject --}}
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-muted uppercase tracking-widest pl-2 block">{{ __('Subject') }}</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-muted z-10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                                    </div>
                                    <select name="subject" required class="w-full pl-12 pr-4 py-4 bg-bg/50 border border-border text-text text-sm rounded-2xl focus:border-primary/50 focus:ring-1 focus:ring-primary/50 placeholder-muted/50 transition-all outline-none appearance-none cursor-pointer">
                                        <option value="" disabled selected>{{ __('Select a subject') }}</option>
                                        <option value="Web Development">{{ __('Web Development') }}</option>
                                        <option value="UI/UX Design">{{ __('UI/UX Design') }}</option>
                                        <option value="Consulting">{{ __('Technical Consulting') }}</option>
                                        <option value="Other">{{ __('Other Inquiry') }}</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-muted">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Budget --}}
                            <div class="space-y-2">
                                <label class="text-[10px] font-bold text-muted uppercase tracking-widest pl-2 block">{{ __('Project Budget') }}</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-muted z-10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <select name="budget" required class="w-full pl-12 pr-4 py-4 bg-bg/50 border border-border text-text text-sm rounded-2xl focus:border-primary/50 focus:ring-1 focus:ring-primary/50 placeholder-muted/50 transition-all outline-none appearance-none cursor-pointer">
                                        <option value="" disabled selected>{{ __('Select range') }}</option>
                                        <option value="< $1k">{{ __('Less than $1,000') }}</option>
                                        <option value="$1k - $5k">{{ __('$1,000 - $5,000') }}</option>
                                        <option value="$5k - $10k">{{ __('$5,000 - $10,000') }}</option>
                                        <option value="> $10k">{{ __('More than $10,000') }}</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-muted">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-muted uppercase tracking-widest pl-2 block">{{ __('Project Details') }}</label>
                            <textarea name="message" required rows="5" class="w-full p-4 bg-bg/50 border border-border text-text text-sm rounded-2xl focus:border-primary/50 focus:ring-1 focus:ring-primary/50 placeholder-muted/50 transition-all outline-none resize-none" placeholder="{{ __('project_details_placeholder') }}"></textarea>
                        </div>

                        {{-- Cloudflare Turnstile Anti-Bot (Invisible) --}}
                        @if(config('services.turnstile.site_key') && config('services.turnstile.site_key') !== 'YOUR_TURNSTILE_SITE_KEY')
                        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="dark" data-size="invisible"></div>
                        @endif

                        {{-- Submit Button --}}
                        <button type="submit" id="contact-submit-btn" class="w-full py-5 rounded-2xl bg-gradient-to-r from-primary to-primary-2 text-white font-bold tracking-widest uppercase text-xs hover:shadow-[0_10px_30px_rgba(59,130,246,0.3)] transition-all duration-300 hover:scale-[1.02] flex items-center justify-center gap-3 group">
                            {{ __('Send Message') }}
                            <svg class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('pageLoaded', initContactForm);
    // Init on first load
    initContactForm();

    function initContactForm() {
        const form = document.getElementById('ajax-contact-form');
        if (!form) return;

        // Ensure we don't attach multiple times
        if (form.dataset.ajaxAttached) return;
        form.dataset.ajaxAttached = "true";

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = `<svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> {{ __('Sending...') }}`;
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    form.reset();
                    window.dispatchEvent(new CustomEvent('notify', { detail: { type: 'success', message: data.message || "{{ __('Message sent successfully!') }}" } }));
                } else {
                    let errMsg = data.message || "{{ __('Something went wrong.') }}";
                    if(data.errors) {
                        errMsg = Object.values(data.errors).flat().join('<br>');
                    }
                    window.dispatchEvent(new CustomEvent('notify', { detail: { type: 'error', message: errMsg } }));
                }
            } catch (error) {
                window.dispatchEvent(new CustomEvent('notify', { detail: { type: 'error', message: "{{ __('Network error. Please try again later.') }}" } }));
            } finally {
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
            }
        });
    }
</script>

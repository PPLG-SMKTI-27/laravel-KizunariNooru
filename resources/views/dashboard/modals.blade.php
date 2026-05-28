{{-- GLOBAL CREATE MODALS --}}

{{-- Create Project --}}
<x-modal name="create-project" focusable>
    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left" x-data="{ lang: 'id' }">
        <h2 class="font-display text-xl font-bold text-white mb-6">Forge New Project</h2>
        
        <!-- Language Tabs -->
        <div class="flex gap-2 mb-6 border-b border-cyan-400/20 pb-2">
            <button type="button" @click="lang = 'id'" :class="lang === 'id' ? 'text-cyan-400 border-cyan-400' : 'text-cyan-400/50 border-transparent'" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border-b-2 transition-colors">ID</button>
            <button type="button" @click="lang = 'en'" :class="lang === 'en' ? 'text-cyan-400 border-cyan-400' : 'text-cyan-400/50 border-transparent'" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border-b-2 transition-colors">EN</button>
            <button type="button" @click="lang = 'ja'" :class="lang === 'ja' ? 'text-cyan-400 border-cyan-400' : 'text-cyan-400/50 border-transparent'" class="px-4 py-2 text-xs font-bold uppercase tracking-widest border-b-2 transition-colors">JA</button>
        </div>

        <form method="POST" action="{{ route('projects.store') }}" class="space-y-4" enctype="multipart/form-data" data-swup-ignore>
            @csrf

            @foreach(['id', 'en', 'ja'] as $l)
            <div x-show="lang === '{{ $l }}'" class="space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title ({{ strtoupper($l) }})</label>
                    <input type="text" name="title[{{ $l }}]" {{ $l === 'id' ? 'required' : '' }} placeholder="Project Title" class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description ({{ strtoupper($l) }})</label>
                    <textarea name="description[{{ $l }}]" rows="3" {{ $l === 'id' ? 'required' : '' }} placeholder="Describe the masterpiece..." class="input-furina"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category ({{ strtoupper($l) }})</label>
                        <input type="text" name="category[{{ $l }}]" placeholder="E.g., Web Development" class="input-furina" {{ $l === 'id' ? 'required' : '' }}>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Features - Markdown ({{ strtoupper($l) }})</label>
                        <textarea name="features[{{ $l }}]" rows="2" placeholder="- Feature 1" class="input-furina"></textarea>
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Challenge ({{ strtoupper($l) }})</label>
                    <textarea name="challenge[{{ $l }}]" rows="2" placeholder="What was the core problem?" class="input-furina"></textarea>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Solution ({{ strtoupper($l) }})</label>
                    <textarea name="solution[{{ $l }}]" rows="2" placeholder="How was it solved?" class="input-furina"></textarea>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Result ({{ strtoupper($l) }})</label>
                    <textarea name="result[{{ $l }}]" rows="2" placeholder="What was the impact?" class="input-furina"></textarea>
                </div>
            </div>
            @endforeach

            <hr class="border-cyan-400/10 my-6">

            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Tech Stack</label>
                <input type="text" name="tech" placeholder="PHP, Laravel, Tailwind" class="input-furina">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">GitHub Link</label>
                    <input type="url" name="github" placeholder="https://github.com/..." class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Demo Link</label>
                    <input type="url" name="demo" placeholder="https://demo.com/..." class="input-furina">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Main Image</label>
                    <input type="file" name="image" class="input-furina text-cyan-400/70 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:text-[10px] file:font-bold file:bg-[#0a1a48]/40 file:text-cyan-400 file:border file:border-cyan-400/20 hover:file:bg-cyan-400/10 cursor-pointer">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Desktop Mockup</label>
                    <input type="file" name="image_desktop" class="input-furina text-cyan-400/70 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:text-[10px] file:font-bold file:bg-[#0a1a48]/40 file:text-cyan-400 file:border file:border-cyan-400/20 hover:file:bg-cyan-400/10 cursor-pointer">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Tablet Mockup</label>
                    <input type="file" name="image_tablet" class="input-furina text-cyan-400/70 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:text-[10px] file:font-bold file:bg-[#0a1a48]/40 file:text-cyan-400 file:border file:border-cyan-400/20 hover:file:bg-cyan-400/10 cursor-pointer">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Mobile Mockup</label>
                    <input type="file" name="image_mobile" class="input-furina text-cyan-400/70 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:text-[10px] file:font-bold file:bg-[#0a1a48]/40 file:text-cyan-400 file:border file:border-cyan-400/20 hover:file:bg-cyan-400/10 cursor-pointer">
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-8">
                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Create</button>
            </div>
        </form>
    </div>
</x-modal>

{{-- Create Skill --}}
<x-modal name="create-skill" focusable>
    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
        <h2 class="font-display text-xl font-bold text-white mb-6">Master New Talent</h2>
        <form method="POST" action="{{ route('skills.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="skill-name" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Skill Name</label>
                <input type="text" id="skill-name" name="name" required placeholder="Skill Name" class="input-furina">
            </div>
            <div>
                <label for="skill-percentage" class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Percentage (0-100)</label>
                <input type="number" id="skill-percentage" name="percentage" min="0" max="100" required placeholder="85" class="input-furina">
            </div>
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Category</label>
                <select name="category" class="input-furina bg-[#050f2e]">
                    <option value="General">General</option>
                    <option value="Backend">Backend</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Design">Design</option>
                    <option value="Tools">Tools</option>
                </select>
            </div>
            <div class="flex justify-end gap-3 mt-8">
                <button type="button" @click="$dispatch('close')" class="px-6 py-2 text-blue-200/50 text-sm">Cancel</button>
                <button type="submit" class="btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">Master</button>
            </div>
        </form>
    </div>
</x-modal>

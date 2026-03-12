{{-- GLOBAL CREATE MODALS --}}

{{-- Create Project --}}
<x-modal name="create-project" focusable>
    <div class="p-8 bg-[#050f2e] border border-cyan-400/20 text-left">
        <h2 class="font-cinzel text-xl font-bold text-white mb-6">Forge New Project</h2>
        <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Title</label>
                <input type="text" name="title" required placeholder="Project Title" class="input-furina">
            </div>
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Description</label>
                <textarea name="description" rows="3" required placeholder="Describe the masterpiece..." class="input-furina"></textarea>
            </div>
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Tech Stack</label>
                <input type="text" name="tech" placeholder="PHP, Laravel, CSS" class="input-furina">
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
        <h2 class="font-cinzel text-xl font-bold text-white mb-6">Master New Talent</h2>
        <form method="POST" action="{{ route('skills.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Skill Name</label>
                <input type="text" name="name" required placeholder="Skill Name" class="input-furina">
            </div>
            <div>
                <label class="text-[10px] font-bold text-cyan-400/50 uppercase tracking-widest block mb-1">Percentage (0-100)</label>
                <input type="number" name="percentage" min="0" max="100" required placeholder="85" class="input-furina">
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

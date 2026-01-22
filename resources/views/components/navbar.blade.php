<nav
    x-data="{
        open:false,
        active:'home',
        setActive(id){ this.active = id }
    }"
    @scroll.window="
        ['home','about','skills','projects','contact'].forEach(id=>{
            const el=document.getElementById(id)
            if(el && el.getBoundingClientRect().top < 150){
                active=id
            }
        })
    "
    class="fixed w-full z-50 backdrop-blur-xl bg-black/40 border-b border-white/10"
>
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <a href="#home" class="font-serif text-xl text-sky-300">
            Rusherimfa
        </a>

        <!-- DESKTOP -->
        <div class="hidden md:flex gap-8 text-sm">
            <template x-for="item in ['home','about','skills','projects','contact']">
                <a
                    :href="'#'+item"
                    class="nav-link"
                    :class="active===item ? 'text-sky-300 underline-glow' : ''"
                >
                    <span x-text="item.charAt(0).toUpperCase()+item.slice(1)"></span>
                </a>
            </template>
        </div>

        <button @click="open=!open" class="md:hidden text-2xl">☰</button>
    </div>
</nav>
    
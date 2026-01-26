<nav x-data="{ isOpen: false }" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 py-4">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="relative">
                    <div class="w-12 h-12 rounded-full hydro-gradient flex items-center justify-center animate-float">
                        <span class="text-white font-bold text-xl">F</span>
                    </div>
                    <div class="absolute -inset-1 hydro-gradient rounded-full blur opacity-30 group-hover:opacity-50 transition-opacity"></div>
                </div>
                <div>
                    <span class="text-2xl font-bold hydro-gradient-text">
                        FurinaDev
                    </span>
                    <div class="h-1 w-0 group-hover:w-full hydro-gradient transition-all duration-300 rounded-full"></div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Home</a>
                <a href="#about" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">About</a>
                <a href="#skills" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Skills</a>
                <a href="#experience" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Experience</a>
                <a href="#education" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Education</a>
                <a href="#projects" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Projects</a>
                <a href="#contact" class="nav-link text-gray-300 hover:text-hydro-cyan transition-colors">Contact</a>
                
                {{-- Admin Login/Logout --}}
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 px-4 py-2 rounded-lg bg-purple-900/30 hover:bg-purple-900/50 transition-colors">
                            <div class="w-6 h-6 rounded-full hydro-gradient flex items-center justify-center">
                                <span class="text-white text-xs">A</span>
                            </div>
                            <span class="text-white">Admin</span>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 glass-effect rounded-xl shadow-xl py-2">
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-blue-900/30">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-400 hover:bg-red-900/20">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-lg hydro-gradient text-white font-medium hover:shadow-lg hover:shadow-cyan-500/30 transition-all">
                        Admin Login
                    </a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="isOpen = !isOpen" class="md:hidden text-gray-300">
                <svg class="w-8 h-8" :class="{ 'hidden': isOpen, 'block': !isOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-8 h-8" :class="{ 'block': isOpen, 'hidden': !isOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="isOpen" class="md:hidden mt-4 glass-effect rounded-xl p-4">
            <div class="flex flex-col space-y-3">
                <a href="#home" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Home</a>
                <a href="#about" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">About</a>
                <a href="#skills" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Skills</a>
                <a href="#experience" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Experience</a>
                <a href="#education" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Education</a>
                <a href="#projects" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Projects</a>
                <a href="#contact" @click="isOpen = false" class="py-2 px-4 rounded-lg hover:bg-blue-900/30">Contact</a>
                
                @auth
                    <div class="pt-3 border-t border-gray-700">
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded-lg bg-purple-900/30 mb-2">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-red-900/20 text-red-400">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="py-2 px-4 rounded-lg hydro-gradient text-white text-center">
                        Admin Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
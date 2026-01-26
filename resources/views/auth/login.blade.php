<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | FurinaDev</title>
    
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .login-bg {
            background: linear-gradient(135deg, #0f0f1a 0%, #1a1a2e 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        .login-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(34, 211, 238, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(34, 211, 238, 0.03) 10px, rgba(34, 211, 238, 0.03) 20px);
            animation: bg-shift 20s ease-in-out infinite alternate;
        }
        
        @keyframes bg-shift {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        
        .login-card {
            background: rgba(26, 26, 46, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 211, 238, 0.3);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(59, 130, 246, 0.2),
                inset 0 0 50px rgba(34, 211, 238, 0.1);
        }
        
        .hydro-shine {
            position: relative;
            overflow: hidden;
        }
        
        .hydro-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 20%,
                rgba(34, 211, 238, 0.1) 50%,
                transparent 80%
            );
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
    </style>
</head>
<body class="login-bg">
    {{-- Rain Effect --}}
    <x-background-rain />
    
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4 py-12">
        <!-- Decorative Elements -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-hydro-cyan/5 rounded-full animate-float"></div>
        <div class="absolute bottom-1/3 right-1/4 w-16 h-16 bg-blue-500/10 rounded-full animate-float" style="animation-delay: 1s;"></div>
        
        <!-- Login Card -->
        <div class="login-card w-full max-w-md rounded-2xl overflow-hidden hydro-shine">
            <!-- Card Header -->
            <div class="relative p-8 text-center border-b border-cyan-800/30">
                <!-- Animated Logo -->
                <div class="relative inline-block mb-6">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 via-cyan-400 to-blue-600 flex items-center justify-center mx-auto animate-float">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full blur opacity-30 animate-pulse"></div>
                </div>
                
                <h1 class="text-3xl font-bold hydro-gradient-text mb-2">
                    Admin Portal
                </h1>
                <p class="text-gray-400 text-sm">
                    Restricted Access • Authorized Personnel Only
                </p>
                
                <!-- Hydro Line -->
                <div class="absolute bottom-0 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-transparent via-cyan-400 to-transparent"></div>
            </div>
            
            <!-- Login Form -->
            <div class="p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Status Messages -->
                    @if($errors->any())
                        <div class="p-4 rounded-lg bg-red-900/20 border border-red-700/30">
                            <div class="flex items-center space-x-2 text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">{{ $errors->first() }}</span>
                            </div>
                        </div>
                    @endif
                    
                    @if(session('status'))
                        <div class="p-4 rounded-lg bg-green-900/20 border border-green-700/30">
                            <div class="flex items-center space-x-2 text-green-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm">{{ session('status') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="flex items-center space-x-2 text-sm font-medium text-gray-300">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            <span>Admin Email</span>
                        </label>
                        <div class="relative group">
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                class="w-full pl-12 pr-4 py-3 bg-card-bg/50 border border-cyan-800/50 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 group-hover:border-cyan-500/70"
                                placeholder="admin@furinadev.com"
                            >
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-cyan-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="flex items-center space-x-2 text-sm font-medium text-gray-300">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span>Password</span>
                        </label>
                        <div class="relative group">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="w-full pl-12 pr-12 py-3 bg-card-bg/50 border border-cyan-800/50 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300 group-hover:border-cyan-500/70"
                                placeholder="••••••••"
                            >
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-cyan-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-cyan-300">
                                <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 text-cyan-500 focus:ring-cyan-500 border-cyan-700 rounded bg-card-bg/50"
                            >
                            <label for="remember" class="ml-2 text-sm text-gray-400">
                                Keep me logged in
                            </label>
                        </div>
                        
                        {{-- Jika mau ada forgot password --}}
                        {{-- <a href="#" class="text-sm text-cyan-400 hover:text-cyan-300 transition-colors">
                            Forgot password?
                        </a> --}}
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full group relative overflow-hidden py-3 px-4 rounded-lg bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-medium hover:shadow-lg hover:shadow-cyan-500/30 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all duration-300"
                    >
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Authenticate Access</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-cyan-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </button>
                </form>

                <!-- Back to Home -->
                <div class="mt-8 pt-6 border-t border-gray-800/50">
                    <a href="{{ route('home') }}" class="flex items-center justify-center space-x-2 text-gray-400 hover:text-cyan-300 transition-colors group">
                        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Back to Portfolio</span>
                    </a>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="px-8 py-4 bg-card-bg/50 border-t border-cyan-800/30">
                <p class="text-xs text-center text-gray-500">
                    <span class="text-cyan-400">⚠️</span> This portal is monitored. All activities are logged.
                </p>
            </div>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
        
        // GSAP Animation for login page
        document.addEventListener('DOMContentLoaded', function() {
            gsap.from('.login-card', {
                duration: 1,
                y: 50,
                opacity: 0,
                scale: 0.95,
                ease: "power3.out"
            });
            
            // Animate form elements
            gsap.from('form > *', {
                duration: 0.8,
                y: 30,
                opacity: 0,
                stagger: 0.1,
                delay: 0.3,
                ease: "power3.out"
            });
        });
    </script>
</body>
</html>
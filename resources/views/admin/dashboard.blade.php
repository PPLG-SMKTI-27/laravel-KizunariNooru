@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-dark-bg">
    <!-- Admin Navbar -->
    <nav class="glass-effect border-b border-cyan-800/30 sticky top-0 z-40">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-600 to-pink-500 flex items-center justify-center">
                        <span class="text-white font-bold">A</span>
                    </div>
                    <div>
                        <span class="text-xl font-bold hydro-gradient-text">
                            Admin Panel
                        </span>
                        <p class="text-xs text-gray-400">FurinaDev Portfolio</p>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="text-right hidden md:block">
                        <p class="text-white font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-cyan-300">{{ auth()->user()->email }}</p>
                    </div>
                    
                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center space-x-2 px-4 py-2 rounded-lg bg-red-900/20 text-red-400 hover:bg-red-900/30 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mx-auto px-6 py-8">
        <!-- Welcome Banner -->
        <div class="mb-8">
            <div class="glass-effect rounded-xl p-6 border border-cyan-800/30">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Welcome back, <span class="hydro-gradient-text">{{ auth()->user()->name }}</span> 👋
                        </h1>
                        <p class="text-gray-300">
                            Last login: {{ auth()->user()->last_login_at ? auth()->user()->last_login_at->diffForHumans() : 'Just now' }}
                        </p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 rounded-lg bg-blue-900/30 hover:bg-blue-900/50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            <span>View Portfolio</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Visitors -->
            <div class="glass-effect rounded-xl p-6 border border-cyan-800/30 hover:hydro-border-glow transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Today's Visitors</p>
                        <p class="text-3xl font-bold text-white">247</p>
                    </div>
                    <div class="p-3 bg-blue-900/30 rounded-lg">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-400 text-sm">↑ 12% from yesterday</p>
            </div>

            <!-- Projects -->
            <div class="glass-effect rounded-xl p-6 border border-cyan-800/30 hover:hydro-border-glow transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Active Projects</p>
                        <p class="text-3xl font-bold text-white">8</p>
                    </div>
                    <div class="p-3 bg-cyan-900/30 rounded-lg">
                        <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-cyan-400 text-sm">3 in progress</p>
            </div>

            <!-- Messages -->
            <div class="glass-effect rounded-xl p-6 border border-cyan-800/30 hover:hydro-border-glow transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Unread Messages</p>
                        <p class="text-3xl font-bold text-white">3</p>
                    </div>
                    <div class="p-3 bg-blue-900/30 rounded-lg">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-yellow-400 text-sm">Requires attention</p>
            </div>

            <!-- Performance -->
            <div class="glass-effect rounded-xl p-6 border border-cyan-800/30 hover:hydro-border-glow transition-all">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-gray-400 text-sm">Site Performance</p>
                        <p class="text-3xl font-bold text-white">98%</p>
                    </div>
                    <div class="p-3 bg-green-900/30 rounded-lg">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-400 text-sm">Excellent</p>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Quick Actions -->
            <div class="lg:col-span-2">
                <div class="glass-effect rounded-xl p-6 border border-cyan-800/30">
                    <h2 class="text-2xl font-bold text-white mb-6">Quick Actions</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#" class="group p-4 rounded-lg bg-blue-900/20 hover:bg-blue-900/30 border border-blue-800/30 hover:border-blue-700/50 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Edit Portfolio</h3>
                                    <p class="text-sm text-gray-400">Update projects and content</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="group p-4 rounded-lg bg-cyan-900/20 hover:bg-cyan-900/30 border border-cyan-800/30 hover:border-cyan-700/50 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-cyan-900/30 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Manage Skills</h3>
                                    <p class="text-sm text-gray-400">Add or update skills section</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="group p-4 rounded-lg bg-purple-900/20 hover:bg-purple-900/30 border border-purple-800/30 hover:border-purple-700/50 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-purple-900/30 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">View Messages</h3>
                                    <p class="text-sm text-gray-400">Check visitor messages</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="group p-4 rounded-lg bg-green-900/20 hover:bg-green-900/30 border border-green-800/30 hover:border-green-700/50 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-green-900/30 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-white">Analytics</h3>
                                    <p class="text-sm text-gray-400">View site statistics</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-xl p-6 border border-cyan-800/30 h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Recent Activity</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-green-900/30 flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white">Updated project "E-commerce"</p>
                                <p class="text-sm text-gray-400">2 hours ago</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-blue-900/30 flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white">Added new skill "GSAP"</p>
                                <p class="text-sm text-gray-400">Yesterday</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-cyan-900/30 flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white">New message from John Doe</p>
                                <p class="text-sm text-gray-400">2 days ago</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 rounded-full bg-purple-900/30 flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white">Backup completed</p>
                                <p class="text-sm text-gray-400">3 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // GSAP animations for dashboard
    document.addEventListener('DOMContentLoaded', function() {
        gsap.from('.glass-effect', {
            duration: 1,
            y: 30,
            opacity: 0,
            stagger: 0.1,
            ease: "power3.out"
        });
    });
</script>
@endpush
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} — Furina Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --navy: #020814; --cyan: #22d3ee; --cyan-lt: #67e8f9;
            --gold: #f0c040; --white: #e8f4ff;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background: var(--navy); color: var(--white); overflow-x: hidden; min-height: 100vh; }
        .font-cinzel { font-family: 'Cinzel', serif; }

        /* Particles */
        #tsparticles-auth { position: fixed; inset: 0; z-index: 0; pointer-events: none; }

        /* Background */
        .auth-bg {
            background:
                radial-gradient(ellipse 80% 60% at 30% 20%,  rgba(34,211,238,0.09) 0%, transparent 65%),
                radial-gradient(ellipse 60% 40% at 75% 75%, rgba(8,145,178,0.07) 0%, transparent 60%),
                linear-gradient(180deg, #020814 0%, #050f2e 50%, #020814 100%);
        }

        /* Animated floating orbs */
        .auth-orb {
            position: fixed; border-radius: 50%; filter: blur(70px);
            pointer-events: none; z-index: 0;
        }
        @keyframes authOrb { 0%,100%{transform:translate(0,0);} 50%{transform:translate(15px,-25px);} }
        .auth-orb-1 { width:400px;height:400px;background:rgba(34,211,238,0.08);top:-10%;right:-5%;animation:authOrb 10s ease-in-out infinite; }
        .auth-orb-2 { width:300px;height:300px;background:rgba(8,145,178,0.07);bottom:-5%;left:-8%;animation:authOrb 12s ease-in-out infinite reverse; }

        /* Card */
        .auth-card {
            background: rgba(255,255,255,0.035);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(34,211,238,0.18);
            border-radius: 1.5rem;
            box-shadow: 0 25px 80px rgba(0,0,0,0.4), 0 0 0 1px rgba(34,211,238,0.05) inset;
        }

        /* Decorative top line on card */
        .auth-card::before {
            content: '';
            position: absolute; top: 0; left: 20%; right: 20%; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(34,211,238,0.6), transparent);
            border-radius: 99px;
        }

        /* Inputs */
        .auth-input {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(34,211,238,0.2);
            border-radius: .75rem;
            padding: .75rem 1.1rem;
            color: #e8f4ff;
            font-size: .9rem;
            outline: none;
            transition: border-color .3s, box-shadow .3s, background .3s;
        }
        .auth-input::placeholder { color: rgba(167,210,255,0.3); }
        .auth-input:focus {
            border-color: rgba(34,211,238,0.6);
            box-shadow: 0 0 0 3px rgba(34,211,238,0.09);
            background: rgba(255,255,255,0.065);
        }

        /* Label */
        .auth-label {
            display: block;
            color: rgba(167,210,255,0.6);
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: .4rem;
        }

        /* Submit button */
        .auth-btn {
            width: 100%;
            background: linear-gradient(135deg, #0891b2, #1d4ed8);
            border: 1px solid rgba(34,211,238,0.4);
            border-radius: .75rem;
            padding: .8rem;
            color: white;
            font-weight: 600;
            font-size: .9rem;
            letter-spacing: .04em;
            cursor: pointer;
            transition: all .3s;
            position: relative;
            overflow: hidden;
        }
        .auth-btn::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(103,232,249,0.25), transparent);
            opacity: 0; transition: opacity .3s;
        }
        .auth-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 35px rgba(34,211,238,0.3); }
        .auth-btn:hover::after { opacity: 1; }

        /* Link */
        .auth-link { color: #67e8f9; font-size: .85rem; transition: color .3s; text-decoration: none; }
        .auth-link:hover { color: #a5f3fc; }

        /* Error text */
        .auth-error { color: #f87171; font-size: .8rem; margin-top: .3rem; }

        /* Grid bg */
        .auth-grid {
            position: fixed; inset: 0; z-index: 0;
            background-image: linear-gradient(rgba(34,211,238,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(34,211,238,.04) 1px,transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
        }

        /* Spinning circle decoration */
        @keyframes spinSlow { to { transform: rotate(360deg); } }
        .spin-slow { animation: spinSlow 20s linear infinite; }
        .spin-rev  { animation: spinSlow 15s linear infinite reverse; }
    </style>
</head>

<body class="auth-bg min-h-screen flex items-center justify-center relative">

    {{-- Decorative elements --}}
    <div class="auth-grid"></div>
    <div class="auth-orb auth-orb-1"></div>
    <div class="auth-orb auth-orb-2"></div>
    <div id="tsparticles-auth"></div>

    {{-- Split layout --}}
    <div class="relative z-10 w-full max-w-5xl mx-auto min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full flex flex-col lg:flex-row items-center gap-12 lg:gap-16">

            {{-- Left panel — Furina branding --}}
            <div class="hidden lg:flex flex-col items-center text-center flex-1 max-w-xs" id="auth-brand">

                {{-- Animated logo --}}
                <div class="relative w-32 h-32 mb-6">
                    <svg class="absolute inset-0 w-full h-full spin-slow opacity-30" viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="56" fill="none" stroke="#22d3ee" stroke-width="1" stroke-dasharray="10 5"/>
                    </svg>
                    <svg class="absolute inset-3 w-[calc(100%-1.5rem)] h-[calc(100%-1.5rem)] spin-rev opacity-20" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="46" fill="none" stroke="#67e8f9" stroke-width="1" stroke-dasharray="4 8"/>
                    </svg>
                    <div class="absolute inset-6 rounded-full bg-gradient-to-br from-cyan-400/20 to-blue-600/20 border border-cyan-400/30 flex items-center justify-center"
                         style="box-shadow:0 0 30px rgba(34,211,238,0.2)">
                        <svg class="w-10 h-10 text-cyan-300" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>

                <h1 class="font-cinzel text-3xl font-bold text-white mb-2">Fahri<span class="text-cyan-400">.</span>dev</h1>
                <p class="font-cinzel text-xs text-cyan-400/50 tracking-[0.3em] uppercase mb-6">Fontaine Portfolio</p>

                <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(34,211,238,0.4),transparent);margin-bottom:1.5rem;width:80%"></div>

                <p class="text-blue-200/55 text-sm leading-relaxed mb-6">
                    "Where every line of code flows with purpose, beauty, and calculated grace."
                </p>

                {{-- Furina mini art --}}
                <svg viewBox="0 0 100 120" class="w-28 opacity-70" fill="none">
                    {{-- simplified Furina --}}
                    <ellipse cx="50" cy="48" rx="18" ry="19" fill="#f4c8a0"/>
                    <path d="M32 42 Q29 28,37 20 Q45 10,50 9 Q55 10,63 20 Q71 28,68 42" fill="#2654c0"/>
                    <path d="M32 42 Q27 52,29 62" fill="#2654c0"/>
                    <path d="M68 42 Q73 52,71 62" fill="#2654c0"/>
                    <path d="M33 39 Q44 27,50 26 Q56 27,67 39 Q60 35,50 34 Q40 35,33 39Z" fill="#1030a0"/>
                    <ellipse cx="50" cy="38" rx="18" ry="3.5" fill="#1a3ab0"/>
                    <circle cx="50" cy="28" r="3" fill="#22d3ee"/>
                    <circle cx="50" cy="28" r="1.5" fill="white" opacity=".8"/>
                    <ellipse cx="42" cy="50" rx="3"   ry="3.5" fill="#5ab0e8"/>
                    <ellipse cx="58" cy="50" rx="3"   ry="3.5" fill="#5ab0e8"/>
                    <ellipse cx="42" cy="50" rx="1.5" ry="2"   fill="#172060"/>
                    <ellipse cx="58" cy="50" rx="1.5" ry="2"   fill="#172060"/>
                    <circle cx="43" cy="49" r="1" fill="white" opacity=".9"/>
                    <circle cx="59" cy="49" r="1" fill="white" opacity=".9"/>
                    <path d="M47 57 Q50 60,53 57" stroke="#d06050" stroke-width="1.2" fill="none" stroke-linecap="round"/>
                    <ellipse cx="50" cy="64" rx="5" ry="4" fill="#f4c8a0"/>
                    <path d="M40 68 Q35 74,32 84 L40 88 Q50 82,60 88 L68 84 Q65 74,60 68 Q50 64,40 68Z" fill="#0e1f6a"/>
                    <path d="M28 92 Q50 80,72 92 Q80 105,60 112 Q50 118,40 112 Q20 105,28 92Z" fill="#152b7a"/>
                    <path d="M26 97 Q50 86,74 97" stroke="white" stroke-width="1" opacity=".4" fill="none"/>
                    <path d="M75" y1="30" x2="73" y2="95" stroke="#22d3ee" stroke-width="1.5" opacity=".8"/>
                    <path d="M70 33 L75 26 L80 33 L75 30Z" fill="#22d3ee"/>
                    <circle cx="75" cy="30" r="3" fill="#22d3ee" opacity=".5"/>
                    <circle cx="75" cy="30" r="1.5" fill="white"/>
                </svg>

                <a href="/" class="mt-6 text-cyan-400/60 hover:text-cyan-300 text-xs transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Portfolio
                </a>
            </div>

            {{-- Right panel — form --}}
            <div class="w-full lg:w-auto lg:flex-1 max-w-md relative" id="auth-form">
                <div class="auth-card relative p-8 md:p-10">
                    {{ $slot }}
                </div>

                {{-- Mobile back link --}}
                <div class="lg:hidden text-center mt-5">
                    <a href="/" class="auth-link text-xs flex items-center justify-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Particles
    tsParticles.load("tsparticles-auth", {
        fullScreen: { enable: false },
        particles: {
            number: { value: 40, density: { enable: true, area: 800 } },
            color: { value: ["#22d3ee","#67e8f9","#a5f3fc"] },
            opacity: { value: { min: 0.04, max: 0.25 } },
            size:    { value: { min: 0.5, max: 2 } },
            move: { enable: true, speed: 0.4, random: true, outModes: "out" },
            links: { enable: true, distance: 110, color: "#22d3ee", opacity: 0.05, width: 1 }
        },
        detectRetina: true
    });

    // GSAP entrance
    gsap.from('#auth-brand > *', { x: -40, opacity: 0, duration: 0.9, ease: 'power3.out', stagger: 0.1, delay: 0.3 });
    gsap.from('#auth-form', { x: 50, opacity: 0, duration: 0.9, ease: 'power3.out', delay: 0.4 });
    </script>
</body>
</html>

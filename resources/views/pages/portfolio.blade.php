<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects — Fahri Noor Royyan</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #020a1f 0%, #050f2e 50%, #020a1f 100%);
            color: #e8f4ff;
            min-height: 100vh;
            padding: 3rem 1.5rem;
        }
        .font-cinzel { font-family: 'Cinzel', serif; }

        .card-furina {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(34,211,238,0.15);
            border-radius: 1.25rem;
            transition: all 0.4s ease;
        }
        .card-furina:hover { border-color: rgba(34,211,238,0.45); transform: translateY(-4px); }

        .text-furina {
            background: linear-gradient(135deg, #67e8f9 0%, #22d3ee 50%, #a5f3fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tech-tag {
            display: inline-flex;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-size: 0.72rem;
            border: 1px solid rgba(34,211,238,0.25);
            background: rgba(34,211,238,0.07);
            color: #67e8f9;
        }

        table { width: 100%; border-collapse: collapse; }
        thead th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(103,232,249,0.6);
            border-bottom: 1px solid rgba(34,211,238,0.15);
            font-family: 'Cinzel', serif;
        }
        tbody td {
            padding: 1rem 1.25rem;
            color: rgba(232,244,255,0.8);
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(34,211,238,0.07);
            vertical-align: top;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: rgba(34,211,238,0.04); }

        .badge-no {
            display: inline-flex;
            width: 1.75rem;
            height: 1.75rem;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(34,211,238,0.12);
            border: 1px solid rgba(34,211,238,0.25);
            color: #67e8f9;
            font-size: 0.75rem;
            font-family: 'Cinzel', serif;
        }
    </style>
</head>
<body>

<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="text-center mb-12">
        <a href="/" class="inline-flex items-center gap-2 text-cyan-400/60 hover:text-cyan-300 text-sm mb-6 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Portfolio
        </a>
        <h1 class="font-cinzel text-4xl font-bold text-furina mb-3">My Projects</h1>
        <p class="text-blue-300/50 text-sm">A collection of works built with Laravel & modern technologies</p>
    </div>

    {{-- Projects Table --}}
    <div class="card-furina overflow-hidden">
        @if($projects->count() == 0)
            <div class="text-center py-20">
                <div class="text-6xl mb-4">🌊</div>
                <p class="text-blue-300/50 text-lg">No projects yet</p>
                <p class="text-blue-300/30 text-sm mt-2">The tide will bring them in...</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>Project Title</th>
                        <th>Description</th>
                        <th>Technologies</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $i => $project)
                    <tr>
                        <td><span class="badge-no">{{ $i+1 }}</span></td>
                        <td>
                            <span class="font-semibold text-white/90">{{ $project->title }}</span>
                        </td>
                        <td class="max-w-xs">
                            <span class="text-blue-200/60 leading-relaxed">{{ $project->description }}</span>
                        </td>
                        <td>
                            @if($project->tech)
                            <div class="flex flex-wrap gap-1">
                                @foreach(explode(',', $project->tech) as $t)
                                    <span class="tech-tag">{{ trim($t) }}</span>
                                @endforeach
                            </div>
                            @else
                                <span class="text-blue-300/30 text-xs">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <p class="text-center text-blue-300/30 text-xs mt-8">
        © {{ date('Y') }} Fahri Noor Royyan · Furina-inspired Portfolio
    </p>
</div>

</body>
</html>
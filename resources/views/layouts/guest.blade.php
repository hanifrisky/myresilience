<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MY RESILIENCE') }} - Masuk / Daftar</title>

        <link rel="icon" href="{{ asset('image/logo-mark.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* 60% White, 30% Royal Blue, 10% Cyan Auth Layout */
            .mr-auth-bg {
                background-color: #f4f7fc;
                position: relative;
                overflow-x: hidden;
                overflow-y: auto;
            }
            .mr-auth-blue-wave {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 52vh;
                z-index: 1;
                pointer-events: none;
            }
            .mr-auth-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 1.5rem;
                box-shadow: 0 25px 50px -15px rgba(15, 61, 145, 0.18), 0 4px 16px -4px rgba(15, 23, 42, 0.05);
                position: relative;
                overflow: hidden;
            }
            .mr-auth-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 5px;
                background: linear-gradient(90deg, #0f3d91 0%, #1d5ed4 65%, #00e5ff 100%);
            }
            .mr-auth-cyan-ring {
                width: 3.5rem;
                height: 3.5rem;
                border-radius: 9999px;
                padding: 3px;
                background: linear-gradient(135deg, #00e5ff, #06b6d4);
                box-shadow: 0 0 25px rgba(0, 229, 255, 0.55);
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body class="font-inter antialiased mr-auth-bg text-slate-800 min-h-screen">
        {{-- 30% Primary Royal Blue Top Wave Shape with 10% Cyan Rim --}}
        <svg class="mr-auth-blue-wave" viewBox="0 0 1440 420" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="authBlueGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#0a2b6e"/>
                    <stop offset="60%" stop-color="#0f3d91"/>
                    <stop offset="100%" stop-color="#1750b8"/>
                </linearGradient>
            </defs>
            <path d="M0,0 L1440,0 L1440,260 C1160,390 860,210 520,330 C260,415 100,350 0,380 Z" fill="#22d3ee" fill-opacity="0.35"/>
            <path d="M0,0 L1440,0 L1440,240 C1140,375 850,195 510,315 C250,400 95,335 0,365 Z" fill="url(#authBlueGrad)"/>
        </svg>

        <div class="min-h-screen flex flex-col justify-center items-center py-6 sm:py-8 px-4 sm:px-6 relative z-10">
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center gap-1.5 sm:gap-2 mb-4 sm:mb-5 group">
                    <div class="mr-auth-cyan-ring group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-full h-full rounded-full object-cover">
                    </div>
                    <div>
                        <span class="text-lg sm:text-xl font-extrabold text-white tracking-tight block drop-shadow-sm">MY RESILIENCE</span>
                        <span class="text-[10px] sm:text-xs font-bold text-cyan-300 uppercase tracking-widest">Cybercounseling SFBC • FIP UM</span>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-5 py-5 sm:px-7 sm:py-6 mr-auth-card">
                <div class="relative z-10">
                    {{ $slot }}
                </div>
            </div>

            <div class="mt-5 pb-4 text-center">
                <a href="/" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-white border border-slate-200 shadow-sm text-xs font-extrabold text-blue-900 hover:border-cyan-400 hover:text-cyan-600 transition-all">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MY RESILIENCE') }} - @yield('title', 'Dashboard')</title>
    <meta name="description" content="@yield('description', 'Model Cybercounseling Berfokus Solusi Berbantuan Self-Help untuk Meningkatkan Resiliensi pada Remaja dengan Kerentanan Psikologis.')">
    <link rel="icon" href="{{ asset_versioned('image/logo-mark.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* 60-30-10 Global Theme (60% White, 30% Royal Blue, 10% Cyan Accent) */
        .sidebar-light-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            border-radius: 0.85rem;
            transition: all 0.2s ease;
        }
        .sidebar-light-item:hover {
            background-color: #eff6ff;
            color: #0f3d91;
        }
        .sidebar-light-item.active {
            background: linear-gradient(135deg, #0f3d91 0%, #1d5ed4 100%);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 6px 16px -4px rgba(15, 61, 145, 0.35);
            border-left: 4px solid #00e5ff;
        }
    </style>
    @stack('styles')
</head>
<body class="font-inter antialiased bg-slate-50 text-slate-800 min-h-screen">
    @yield('body')
    @stack('scripts')
</body>
</html>

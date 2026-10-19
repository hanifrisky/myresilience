@extends('layouts.base')

@section('body')
<div class="min-h-screen flex flex-col">
    {{-- Top Navbar --}}
    <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-lg border-b border-slate-200 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-3">
            <div class="flex items-center gap-4 lg:gap-6 min-w-0">
                <a href="{{ route('konseli.dashboard') }}" class="flex items-center gap-2 flex-shrink-0">
                    <img src="{{ asset_versioned('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-8 h-8 rounded-lg object-cover shadow-sm">
                    <span class="font-extrabold text-slate-800 text-sm sm:text-base whitespace-nowrap">MY RESILIENCE</span>
                </a>
                
                {{-- Tablet Landscape & Desktop Links --}}
                <nav class="hidden md:flex items-center gap-3.5 lg:gap-5">
                    <a href="{{ route('konseli.dashboard') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.dashboard') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Beranda</a>
                    <a href="{{ route('konseli.counselor.index') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.counselor.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Pilih Konselor</a>
                    <a href="{{ route('konseli.wellbeing.index') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.wellbeing.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Resiliensi</a>
                    <a href="{{ route('konseli.tribe.index') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.tribe.*', 'konseli.self-help.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Self-Help</a>
                    @if($hasLessons ?? \App\Models\Lesson::exists())
                    <a href="{{ route('konseli.lessons.index') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.lessons.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Materi</a>
                    @endif
                    <a href="{{ route('konseli.profile.edit') }}" class="text-sm font-semibold whitespace-nowrap {{ request()->routeIs('konseli.profile.*') ? 'text-blue-600' : 'text-slate-500 hover:text-slate-800' }}">Profil</a>
                </nav>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <span class="text-sm text-slate-500 hidden lg:block max-w-[160px] truncate" title="{{ auth()->user()->name }}">Halo, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs sm:text-sm text-red-500 hover:text-red-700 font-bold px-2.5 py-1.5 rounded-lg hover:bg-red-50 transition-colors">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="max-w-5xl mx-auto w-full px-4 sm:px-6 mt-4">
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if(session('error'))
    <div class="max-w-5xl mx-auto w-full px-4 sm:px-6 mt-4">
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-center gap-2">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-1 max-w-5xl mx-auto w-full px-4 sm:px-6 pt-6 pb-24 md:pb-8">
        @yield('content')
    </main>

    {{-- Bottom Navigation (Mobile & Portrait Tablet) --}}
    @php
        $showMateriNav = $hasLessons ?? \App\Models\Lesson::exists();
    @endphp
    <nav class="fixed bottom-0 inset-x-0 bg-white/95 backdrop-blur-md border-t border-slate-200 md:hidden z-30 safe-bottom shadow-[0_-4px_16px_rgba(15,23,42,0.04)]">
        <div class="grid {{ $showMateriNav ? 'grid-cols-6' : 'grid-cols-5' }} gap-0.5 sm:gap-1 px-1 sm:px-3 py-2 max-w-lg mx-auto">
            <a href="{{ route('konseli.dashboard') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.dashboard') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="truncate max-w-full">Beranda</span>
            </a>
            <a href="{{ route('konseli.counselor.index') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.counselor.*') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span class="truncate max-w-full">Konselor</span>
            </a>
            <a href="{{ route('konseli.wellbeing.index') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.wellbeing.*') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <span class="truncate max-w-full">Resiliensi</span>
            </a>
            <a href="{{ route('konseli.tribe.index') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.tribe.*', 'konseli.self-help.*') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span class="truncate max-w-full">Self-Help</span>
            </a>
            @if($showMateriNav)
            <a href="{{ route('konseli.lessons.index') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.lessons.*') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span class="truncate max-w-full">Materi</span>
            </a>
            @endif
            <a href="{{ route('konseli.profile.edit') }}" class="flex flex-col items-center justify-center gap-1 py-1 px-0.5 text-[10px] sm:text-xs font-medium min-w-0 {{ request()->routeIs('konseli.profile.*') ? 'text-blue-600 font-bold' : 'text-slate-400 hover:text-slate-600' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="truncate max-w-full">Profil</span>
            </a>
        </div>
    </nav>
</div>
@endsection

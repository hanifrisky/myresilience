@extends('layouts.base')

@section('title', 'Beranda - MY RESILIENCE')
@section('description', 'MODEL CYBERCOUNSELING BERFOKUS SOLUSI BERBANTUAN SELF-HELP UNTUK MENINGKATKAN RESILIENSI PADA REMAJA DENGAN KERENTANAN PSIKOLOGIS')

@section('body')
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 text-white selection:bg-blue-500 selection:text-white">
    
    {{-- Decorative Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute top-1/3 left-10 w-[400px] h-[400px] bg-indigo-500/5 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s"></div>
        <div class="absolute bottom-1/4 right-10 w-[450px] h-[450px] bg-cyan-500/10 rounded-full blur-[110px] animate-pulse" style="animation-delay: 4s"></div>
    </div>

    {{-- Navbar --}}
    <nav class="fixed top-0 inset-x-0 z-50 bg-slate-950/70 backdrop-blur-md border-b border-white/10 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-10 h-10 rounded-xl object-cover shadow-lg shadow-blue-500/20">
                <div class="flex flex-col">
                    <span class="text-base font-black tracking-tight text-white leading-none">MY RESILIENCE</span>
                    <span class="text-[9px] font-bold text-blue-300 tracking-widest uppercase mt-0.5">KEMENDIKTI SAINTEK • UM</span>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                {{-- Logos in Navbar --}}
                <div class="hidden lg:flex items-center gap-3 bg-white/5 border border-white/10 rounded-2xl px-4 py-1.5">
                    <img src="{{ asset('image/logo/Diktisaintek.png') }}" alt="KEMENDIKTI SAINTEK - Saintek Berdampak" class="h-7 object-contain">
                    <div class="h-5 w-px bg-white/20 mx-1"></div>
                    <img src="{{ asset('image/logo/logo-um.webp') }}" alt="Universitas Negeri Malang (UM)" class="h-6 object-contain">
                </div>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/25 transition-all duration-200 text-sm hover:scale-[1.02]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-300 hover:text-white transition-colors px-4 py-2">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/25 transition-all duration-200 text-sm hover:scale-[1.02]">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Hero & Welcome Section --}}
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center gap-2.5 px-5 py-2 bg-blue-500/10 backdrop-blur border border-blue-400/20 rounded-2xl text-blue-300 text-xs sm:text-sm font-black uppercase tracking-wider mb-8 animate-fade-in max-w-3xl leading-relaxed">
                <span class="w-2 h-2 bg-blue-400 rounded-full animate-ping flex-shrink-0"></span>
                <span>MODEL CYBERCOUNSELING BERFOKUS SOLUSI BERBANTUAN SELF-HELP UNTUK MENINGKATKAN RESILIENSI PADA REMAJA DENGAN KERENTANAN PSIKOLOGIS</span>
            </div>
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-8">
                SELAMAT DATANG DI LAMAN <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-indigo-400 bg-clip-text text-transparent">MY RESILIENCE!</span>
            </h1>

            {{-- Institutional Partner Logos Row --}}
            <div class="flex flex-wrap items-center justify-center gap-6 sm:gap-10 py-5 px-8 bg-white/5 border border-white/10 rounded-3xl max-w-2xl mx-auto shadow-xl backdrop-blur-md mb-10 hover:border-white/20 transition-all duration-300">
                <div class="flex flex-col items-center gap-1.5">
                    <span class="text-[9px] font-black text-blue-400 tracking-widest uppercase">KEMENDIKTI SAINTEK</span>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('image/logo/Diktisaintek.png') }}" alt="KEMENDIKTI SAINTEK - Saintek Berdampak" class="h-10 sm:h-12 object-contain hover:scale-105 transition-transform duration-200">
                    </div>
                </div>
                <div class="hidden sm:block h-10 w-px bg-white/10"></div>
                <div class="flex flex-col items-center gap-1.5">
                    <span class="text-[9px] font-black text-slate-400 tracking-widest uppercase">UNIVERSITAS NEGERI MALANG</span>
                    <div class="flex items-center gap-4 sm:gap-6">
                        <img src="{{ asset('image/logo/logo-um.webp') }}" alt="UM" class="h-10 sm:h-12 object-contain hover:scale-105 transition-transform duration-200">
                    </div>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-6 sm:p-8 text-left space-y-5 max-w-4xl mx-auto shadow-2xl">
                <p class="text-base sm:text-lg text-slate-100 font-semibold leading-relaxed">
                    Halo! Selamat datang di <strong>MY RESILIENCE</strong>—ruang aman yang dirancang khusus untuk mendampingimu tumbuh menjadi pribadi yang lebih tangguh.
                </p>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-medium">
                    Laman ini merupakan platform bantuan berbasis cybercounseling berfokus solusi (<em>Solution-Focused Brief Counseling</em>) yang dilengkapi dengan modul self-help interaktif. Di sini, kamu tidak diajak untuk terus berfokus pada masalah atau kegagalan masa lalu, melainkan diajak untuk menemukan kekuatan diri, menemukan jalan keluar, dan melangkah menuju masa depan yang kamu harapkan.
                </p>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-medium">
                    Setiap tantangan yang kamu hadapi hari ini adalah bagian dari proses belajar. Mari bersama-sama mengeksplorasi potensi dan solusi terbaik yang ada di dalam dirimu melalui berbagai fitur dan panduan interaktif yang telah kami sediakan.
                </p>
                <div class="pt-2">
                    <p class="text-sm sm:text-base text-blue-300 leading-relaxed bg-blue-500/10 border border-blue-500/20 p-4 rounded-2xl font-bold text-center">
                        Selamat bertumbuh dan menemukan kembali ketangguhan dirimu!
                    </p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10">
                <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-extrabold rounded-2xl shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 hover:from-blue-600 hover:to-indigo-700 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-base">
                    Mulai Sesi Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="#langkah" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/5 backdrop-blur text-slate-200 font-bold rounded-2xl border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300 text-base">
                    Langkah Penggunaan
                </a>
            </div>
        </div>
    </section>

    {{-- Steps Section --}}
    <section id="langkah" class="py-20 px-4 sm:px-6 lg:px-8 border-t border-white/5 bg-slate-950/40 relative">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl font-black text-white mb-4">Langkah Penggunaan</h2>
                <p class="text-slate-400 text-sm max-w-xl mx-auto font-medium">Ikuti alur berikut untuk memulai sesi di MY RESILIENCE</p>
            </div>
            
            <div class="relative pl-6 sm:pl-8 border-l border-blue-500/30 space-y-6 max-w-2xl mx-auto">
                @php
                    $steps = [
                        'Silakan register akun',
                        'Masuk melalui menu log-in',
                        'Memilih konselor',
                        'Mengisi instrumen resiliensi sebelum mengikuti sesi self-help',
                        'Melakukan sesi self-help',
                        'Mengisi instrumen resiliensi setelah mengikuti sesi self-help',
                        'Mengkomunikasikan hasil self-help dengan konselor',
                        'Menghubungi konselor sekolah jika dibutuhkan sesi lanjutan konseling'
                    ];
                @endphp
                @foreach($steps as $idx => $step)
                    <div class="relative group">
                        {{-- Timeline Dot --}}
                        <div class="absolute -left-[35px] sm:-left-[43px] top-0.5 w-6 h-6 rounded-full bg-slate-900 border-2 border-blue-500 flex items-center justify-center text-[10px] font-black text-blue-400 shadow-lg shadow-blue-500/20 group-hover:scale-110 transition-transform duration-200">
                            {{ $idx + 1 }}
                        </div>
                        <div class="p-4 bg-white/5 border border-white/5 rounded-2xl hover:border-blue-500/20 hover:bg-white/10 transition-all duration-300">
                            <p class="text-sm sm:text-base font-bold text-slate-200 leading-relaxed">{{ $step }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section id="pengembang" class="py-20 px-4 sm:px-6 lg:px-8 border-t border-white/5">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl font-black text-white mb-4">Tentang Pengembang</h2>
                <p class="text-slate-400 text-sm max-w-xl mx-auto font-medium">Tim pengembang platform MY RESILIENCE</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @php
                    $team = [
                        ['name' => 'Prof. Dr. M. Ramli, M.A', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MR', 'grad' => 'from-blue-500 to-indigo-600', 'photo' => 'image/team/ramli.png'],
                        ['name' => 'Prof. Dr. Nur Hidayah, M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'NH', 'grad' => 'from-purple-500 to-pink-600', 'photo' => 'image/team/nur-hidayah.png'],
                        ['name' => 'Dr. Nur Eva, M.Psi., Psikolog', 'role' => 'Fakultas Psikologi UM', 'initials' => 'NE', 'grad' => 'from-emerald-500 to-teal-600', 'photo' => 'image/team/nur-eva.png'],
                        ['name' => 'Dr. Nur Mega Aris Saputra, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'AS', 'grad' => 'from-cyan-500 to-blue-600', 'photo' => 'image/team/aris-saputra.png'],
                        ['name' => 'Muh Khoiruddin Jalil, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MJ', 'grad' => 'from-indigo-500 to-purple-600', 'photo' => 'image/team/khoiruddin-jalil.png'],
                        ['name' => 'Muh. Nur Alamsyah, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MA', 'grad' => 'from-pink-500 to-rose-600', 'photo' => 'image/team/alamsyah.png'],
                    ];
                @endphp
                @foreach($team as $member)
                    <div class="group p-6 bg-white/5 border border-white/5 rounded-3xl hover:border-blue-500/20 hover:bg-white/10 hover:shadow-2xl hover:shadow-blue-500/5 transition-all duration-300 flex flex-col items-center text-center">
                        {{-- Photo or Placeholder --}}
                        @if(isset($member['photo']) && file_exists(public_path($member['photo'])))
                            <div class="w-16 h-16 rounded-2xl overflow-hidden shadow-lg mb-4 group-hover:scale-105 transition-transform duration-300 border border-white/10">
                                <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $member['grad'] }} flex flex-col items-center justify-center text-white shadow-lg mb-4 group-hover:scale-105 transition-transform duration-300 border border-white/10">
                                <svg class="w-7 h-7 text-white mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="text-[9px] font-black tracking-widest uppercase leading-none">{{ $member['initials'] }}</span>
                            </div>
                        @endif
                        <h3 class="text-sm sm:text-base font-black text-slate-100 leading-snug group-hover:text-blue-300 transition-colors">
                            {{ $member['name'] }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact & Footer Section --}}
    <footer id="kontak" class="border-t border-white/10 bg-slate-950 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 border-b border-white/5 pb-12">
            {{-- Left column --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-8 h-8 rounded-lg object-cover shadow-lg">
                    <span class="text-lg font-black text-white">MY RESILIENCE</span>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed font-medium">
                    Model Cybercounseling Berfokus Solusi Berbantuan Self-Help untuk Meningkatkan Resiliensi pada Remaja dengan Kerentanan Psikologis. Didukung oleh KEMENDIKTI SAINTEK (Saintek Berdampak) dan Universitas Negeri Malang (UM).
                </p>
            </div>
            
            {{-- Right column --}}
            <div class="space-y-6">
                <h4 class="text-sm font-black text-slate-200 uppercase tracking-widest">Informasi Kontak & Alamat</h4>
                <div class="space-y-4">
                    <div class="flex items-start gap-3 text-slate-300 text-sm">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <div>
                            <p class="font-bold text-slate-200 mb-0.5">Alamat:</p>
                            <p class="font-medium text-slate-400">Departemen Bimbingan dan Konseling FIP UM<br>Jl. Semarang No 5 Kota Malang</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 text-slate-300 text-sm">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <div>
                            <p class="font-bold text-slate-200 mb-0.5">Kontak:</p>
                            <p class="font-medium text-slate-400">+62812-3175-0634</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 text-slate-300 text-sm">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <div>
                            <p class="font-bold text-slate-200 mb-0.5">Email:</p>
                            <a href="mailto:aris.saputra.fip@um.ac.id" class="font-medium text-blue-400 hover:text-blue-300 hover:underline transition-colors">aris.saputra.fip@um.ac.id</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="max-w-6xl mx-auto text-center pt-8 text-slate-500 text-xs font-bold uppercase tracking-wider">
            &copy; {{ date('Y') }} MY RESILIENCE. All rights reserved. • KEMENDIKTI SAINTEK - UM
        </div>
    </footer>
</div>
@endsection

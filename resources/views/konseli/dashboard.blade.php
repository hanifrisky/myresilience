@extends('layouts.konseli')

@section('title', 'Beranda Konseli')

@section('content')
@php
    $user = auth()->user();
    
    // Check progress
    $counselorSelected = !is_null($user->selected_counselor_id);
    
    $preTest = $user->wellbeingAnswers()->where('type', 'pre_test')->first();
    $preTestCompleted = $preTest && $preTest->status === 'completed';
    
    $defaultTribe = $user->selectedTribe ?? \App\Models\Tribe::first();
    
    // Check self-help progress: did they answer at least one self-help question?
    $hasSelfHelpAnswers = \App\Models\SelfHelpAnswer::where('konseli_id', $user->id)->exists();
    
    $postTest = $user->wellbeingAnswers()->where('type', 'post_test')->first();
    $postTestCompleted = $postTest && $postTest->status === 'completed';
@endphp

<div class="space-y-8 animate-fade-in pb-16">
    {{-- Header --}}
    <div class="p-6 bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 rounded-3xl text-white shadow-xl shadow-blue-500/10">
        <h3 class="text-2xl font-bold">Halo, {{ $user->name }}!</h3>
        <p class="text-blue-100 mt-1.5 text-sm">Selamat datang di MY RESILIENCE. Mari ikuti langkah-langkah di bawah ini untuk menemukan kekuatan diri, mengeksplorasi solusi, dan meningkatkan ketangguhan (resiliensi) dirimu.</p>
    </div>

    {{-- Progress Steps --}}
    <div class="space-y-5">
        <h4 class="font-extrabold text-slate-800 text-lg">Langkah Penggunaan & Peta Jalan Anda</h4>
        
        <div class="grid grid-cols-1 gap-4">
            
            {{-- Step 1: Choose Counselor --}}
            <div class="card p-4 sm:p-5 flex items-start gap-3.5 sm:gap-4 {{ $counselorSelected ? 'border-emerald-200 bg-emerald-50/10' : 'border-slate-200' }}">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-sm {{ $counselorSelected ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }}">
                    @if($counselorSelected)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    @else
                        1
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center justify-between gap-2">
                        <h5 class="font-bold text-slate-800 text-sm">Langkah 1: Memilih Konselor</h5>
                        <span class="flex-shrink-0 whitespace-nowrap text-xs font-bold {{ $counselorSelected ? 'text-emerald-600 bg-emerald-100/60' : 'text-amber-600 bg-amber-50' }} px-2.5 py-0.5 rounded-lg border border-current/10">
                            {{ $counselorSelected ? 'Selesai' : 'Belum Selesai' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        @if($counselorSelected)
                            Konselor pendamping Anda saat ini: <strong class="text-slate-700">{{ $user->selectedCounselor->name }}</strong>. Anda dapat berkomunikasi langsung melalui WhatsApp.
                        @else
                            Pilih konselor pendamping yang siap mendengarkan, mendampingi proses self-help, dan membantu Anda menemukan solusi terbaik.
                        @endif
                    </p>
                    <div class="mt-3.5">
                        <a href="{{ route('konseli.counselor.index') }}" class="btn-primary btn-sm bg-gradient-to-r from-blue-500 to-blue-600">
                            {{ $counselorSelected ? 'Hubungi / Ganti Konselor' : 'Pilih Konselor Sekarang' }}
                        </a>
                    </div>
                </div>
            </div>

            {{-- Step 2: Pre-Test Resiliensi --}}
            <div class="card p-4 sm:p-5 flex items-start gap-3.5 sm:gap-4 {{ $preTestCompleted ? 'border-emerald-200 bg-emerald-50/10' : 'border-slate-200' }}">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-sm {{ $preTestCompleted ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }}">
                    @if($preTestCompleted)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    @else
                        2
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center justify-between gap-2">
                        <h5 class="font-bold text-slate-800 text-sm">Langkah 2: Mengisi Instrumen Resiliensi Sebelum Sesi Self-Help (Pre-Test)</h5>
                        <span class="flex-shrink-0 whitespace-nowrap text-xs font-bold {{ $preTestCompleted ? 'text-emerald-600 bg-emerald-100/60' : 'text-amber-600 bg-amber-50' }} px-2.5 py-0.5 rounded-lg border border-current/10">
                            {{ $preTestCompleted ? 'Selesai' : 'Belum Selesai' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Ukur tingkat resiliensi awal Anda sebelum memulai sesi self-help berfokus solusi.</p>
                    <div class="mt-3.5">
                        @if($preTestCompleted)
                            <a href="{{ route('konseli.wellbeing.result', 'pre_test') }}" class="btn-secondary btn-sm">Lihat Hasil Pre-Test</a>
                        @else
                            <a href="{{ route('konseli.wellbeing.index') }}" class="btn-primary btn-sm bg-gradient-to-r from-blue-500 to-blue-600">Isi Instrumen Pre-Test</a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Step 3: Sesi Self-Help --}}
            <div class="card p-4 sm:p-5 flex items-start gap-3.5 sm:gap-4 {{ $hasSelfHelpAnswers ? 'border-emerald-200 bg-emerald-50/10' : 'border-slate-200' }}">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-sm {{ $hasSelfHelpAnswers ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }}">
                    @if($hasSelfHelpAnswers)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    @else
                        3
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center justify-between gap-2">
                        <h5 class="font-bold text-slate-800 text-sm">Langkah 3: Melakukan Sesi Self-Help Berfokus Solusi</h5>
                        <span class="flex-shrink-0 whitespace-nowrap text-xs font-bold {{ $hasSelfHelpAnswers ? 'text-emerald-600 bg-emerald-100/60' : 'text-amber-600 bg-amber-50' }} px-2.5 py-0.5 rounded-lg border border-current/10">
                            {{ $hasSelfHelpAnswers ? 'Selesai' : 'Belum Selesai' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Ikuti modul self-help interaktif berbasis Solution-Focused Brief Counseling (SFBC) untuk mengenali kekuatan diri, merumuskan tujuan positif, dan menyusun langkah solusi menuju masa depan yang diharapkan.</p>
                    <div class="mt-3.5">
                        @if($defaultTribe)
                            <a href="{{ route('konseli.self-help.show', $defaultTribe->id) }}" class="btn-primary btn-sm bg-gradient-to-r from-blue-500 to-blue-600">Mulai Sesi Self-Help</a>
                        @else
                            <a href="{{ route('konseli.tribe.index') }}" class="btn-primary btn-sm bg-gradient-to-r from-blue-500 to-blue-600">Buka Modul Self-Help</a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Step 4: Post-Test Resiliensi --}}
            <div class="card p-4 sm:p-5 flex items-start gap-3.5 sm:gap-4 {{ $postTestCompleted ? 'border-emerald-200 bg-emerald-50/10' : 'border-slate-200' }}">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-sm {{ $postTestCompleted ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }}">
                    @if($postTestCompleted)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    @else
                        4
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center justify-between gap-2">
                        <h5 class="font-bold text-slate-800 text-sm">Langkah 4: Mengisi Instrumen Resiliensi Setelah Sesi Self-Help (Post-Test)</h5>
                        <span class="flex-shrink-0 whitespace-nowrap text-xs font-bold {{ $postTestCompleted ? 'text-emerald-600 bg-emerald-100/60' : 'text-amber-600 bg-amber-50' }} px-2.5 py-0.5 rounded-lg border border-current/10">
                            {{ $postTestCompleted ? 'Selesai' : 'Belum Selesai' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Setelah menyelesaikan sesi self-help, isi kembali instrumen resiliensi untuk melihat perkembangan ketangguhan psikologis Anda.</p>
                    <div class="mt-3.5">
                        @if($postTestCompleted)
                            <a href="{{ route('konseli.wellbeing.result', 'post_test') }}" class="btn-secondary btn-sm">Lihat Hasil Post-Test</a>
                        @else
                            @if($preTestCompleted && $hasSelfHelpAnswers)
                                <a href="{{ route('konseli.wellbeing.index') }}" class="btn-primary btn-sm bg-gradient-to-r from-blue-500 to-blue-600">Isi Instrumen Post-Test</a>
                            @else
                                <button disabled class="btn-secondary btn-sm cursor-not-allowed opacity-50 whitespace-normal text-left sm:text-center">Isi Post-Test (Selesaikan Pre-Test & Self-Help Dulu)</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            {{-- Step 5: Komunikasi Hasil & Tindak Lanjut --}}
            <div class="card p-4 sm:p-5 flex items-start gap-3.5 sm:gap-4 {{ ($postTestCompleted && $counselorSelected) ? 'border-emerald-200 bg-emerald-50/10' : 'border-slate-200' }}">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 font-bold text-sm {{ ($postTestCompleted && $counselorSelected) ? 'bg-emerald-100 text-emerald-600' : 'bg-blue-100 text-blue-600' }}">
                    5
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap sm:flex-nowrap items-start sm:items-center justify-between gap-2">
                        <h5 class="font-bold text-slate-800 text-sm">Langkah 5: Komunikasi Hasil Self-Help & Konseling Lanjutan</h5>
                    </div>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Komunikasikan hasil self-help Anda dengan konselor pendamping, serta hubungi konselor sekolah jika dibutuhkan sesi konseling lanjutan.</p>
                    <div class="mt-3.5 flex flex-wrap gap-2">
                        @if($counselorSelected && $user->selectedCounselor?->counselorProfile?->whatsapp_number)
                            <a href="{{ $user->selectedCounselor->counselorProfile->whatsapp_url }}" target="_blank" class="btn-primary btn-sm bg-emerald-600 hover:bg-emerald-700">
                                Hubungi Konselor via WhatsApp
                            </a>
                        @else
                            <a href="{{ route('konseli.counselor.index') }}" class="btn-secondary btn-sm">
                                Lihat Kontak Konselor
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

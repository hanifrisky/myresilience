@extends('layouts.konseli')

@section('title', 'Modul Self-Help')

@section('content')
<div class="space-y-6 animate-fade-in pb-16">
    <div class="border-b border-slate-200 pb-4">
        <h2 class="text-2xl font-bold text-slate-800">Modul Self-Help Berfokus Solusi</h2>
        <p class="text-sm text-slate-500 mt-1">Pilih modul self-help di bawah ini untuk memulai sesi eksplorasi potensi, kekuatan diri, dan perumusan solusi menuju masa depan yang Anda harapkan.</p>
    </div>

    @if($tribes->isEmpty())
        <div class="card p-12 text-center bg-white">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            <h4 class="text-lg font-bold text-slate-700">Belum Ada Modul Self-Help Terdaftar</h4>
            <p class="text-sm text-slate-500 mt-1">Hubungi admin untuk mengaktifkan modul self-help.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tribes as $tribe)
                @php 
                    $isSelected = $tribe->id == $selectedTribeId;
                @endphp
                <div class="border-2 rounded-3xl p-6 flex flex-col justify-between bg-white relative transition-all duration-300 hover:shadow-md {{ $isSelected ? 'border-blue-500 ring-4 ring-blue-500/10' : 'border-slate-200/80' }}">
                    @if($isSelected)
                        <div class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-extrabold px-2.5 py-1 rounded-full uppercase tracking-wider">
                            Aktif
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded-lg font-bold border border-blue-100 uppercase tracking-wider">
                                Modul Self-Help
                            </span>
                        </div>
                        
                        <h4 class="font-extrabold text-slate-800 text-xl mb-1">{{ $tribe->name }}</h4>
                        <p class="text-xs text-slate-400 font-semibold mb-6">{{ $tribe->materials_count }} Sesi Refleksi Terdaftar</p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 mt-6">
                        @if($isSelected)
                            <a href="{{ route('konseli.self-help.show', $tribe) }}" class="w-full btn-primary bg-gradient-to-r from-blue-500 to-blue-600 py-3 font-bold text-center block text-sm">
                                Buka Sesi Self-Help
                            </a>
                        @else
                            <form action="{{ route('konseli.tribe.select', $tribe) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full btn-secondary py-3 font-bold text-center text-sm">
                                    Mulai Modul Ini
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

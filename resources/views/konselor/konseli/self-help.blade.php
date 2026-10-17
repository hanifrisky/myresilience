@extends('layouts.konselor')

@section('title', 'Hasil Self-Help Konseli')
@section('page-title', 'Hasil Self-Help: ' . $user->name)

@section('header-actions')
<a href="{{ route('konselor.dashboard') }}" class="btn-secondary">Kembali</a>
@endsection

@section('content')
<div class="space-y-6 animate-fade-in pb-16">
    
    @if(!$tribe)
        <div class="card p-12 text-center bg-white border border-slate-200/80">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            <h4 class="text-lg font-bold text-slate-700">Konseli Belum Memulai Modul Self-Help</h4>
            <p class="text-sm text-slate-500 mt-1">Kemajuan pengisian lembar refleksi SFBC akan ditampilkan di sini setelah konseli memulai sesi self-help.</p>
        </div>
    @else
        @php
            $materials = $tribe->materials->sortBy('order')->values();
        @endphp

        <div class="card p-4 sm:p-5 bg-white border border-slate-200/80">
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-xs font-bold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-lg border border-blue-100 uppercase tracking-wider">
                    Modul Self-Help
                </span>
                <h3 class="font-extrabold text-slate-800 text-lg">{{ $tribe->name }}</h3>
            </div>
            <p class="text-sm text-slate-500 mt-1.5">Berikut adalah jawaban-jawaban eksplorasi solusi berbasis <em>Solution-Focused Brief Counseling</em> (SFBC) yang telah dituliskan oleh konseli <strong>{{ $user->name }}</strong>.</p>
        </div>

        @if($materials->isEmpty())
            <div class="card p-12 text-center bg-white border border-slate-200/80">
                <p class="text-sm text-slate-400 font-semibold italic">Belum ada sesi materi yang terdaftar pada modul {{ $tribe->name }}.</p>
            </div>
        @else
            <div x-data="{
                activeTab: 0,
                materialQuestions: {{ json_encode($materials->map(fn($m) => $m->questions->pluck('id')->values())->values()) }},
                answers: {{ json_encode((object) $answers) }},
                isMaterialComplete(idx) {
                    const qIds = this.materialQuestions[idx] || [];
                    if (qIds.length === 0) return false;
                    return qIds.every(qId => {
                        const val = this.answers ? this.answers[qId] : '';
                        return val !== undefined && val !== null && String(val).trim().length > 0;
                    });
                }
            }">
                <!-- Horizontal Tabs -->
                <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-thin mb-6">
                    @foreach($materials as $idx => $material)
                        <button type="button" 
                                @click="activeTab = {{ $idx }}"
                                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full text-xs font-bold border transition-all duration-200 flex-shrink-0 active:scale-95"
                                :class="activeTab === {{ $idx }} 
                                    ? 'bg-blue-600 border-blue-600 text-white shadow-sm' 
                                    : (isMaterialComplete({{ $idx }}) 
                                        ? 'bg-emerald-50/70 border-emerald-200 text-slate-700 hover:bg-emerald-50' 
                                        : 'bg-white border-slate-200 text-slate-500 hover:text-slate-700 hover:bg-slate-50')">
                            <span class="w-4 h-4 rounded-full inline-flex items-center justify-center flex-shrink-0 transition-colors duration-200"
                                  :title="isMaterialComplete({{ $idx }}) ? 'Seluruh pertanyaan pada materi ini sudah dijawab' : 'Belum seluruh pertanyaan dijawab'"
                                  :class="isMaterialComplete({{ $idx }})
                                      ? (activeTab === {{ $idx }} ? 'bg-emerald-400 text-white shadow-sm' : 'bg-emerald-500 text-white')
                                      : (activeTab === {{ $idx }} ? 'bg-white/20 text-white/40' : 'bg-slate-100 text-slate-300')">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>{{ $material->title }}</span>
                        </button>
                    @endforeach
                </div>

                <!-- Tab Contents -->
                @foreach($materials as $idx => $material)
                    <div class="space-y-6" x-show="activeTab === {{ $idx }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2">
                        
                        {{-- Material details --}}
                        <div class="card p-4 sm:p-6 bg-white border border-slate-200/80">
                            <h4 class="font-extrabold text-slate-800 text-base mb-2">{{ $material->title }}</h4>
                            @if($material->values)
                                <div class="mb-3">
                                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100">
                                        Fokus Resiliensi: {{ $material->values }}
                                    </span>
                                </div>
                            @endif
                            <p class="text-sm text-slate-500 leading-relaxed whitespace-pre-line">{{ $material->description ?: 'Tidak ada deskripsi pengantar.' }}</p>
                        </div>

                        {{-- SFBC Reflections List --}}
                        <div class="card p-4 sm:p-6 bg-white border border-slate-200/80 space-y-6">
                            <h4 class="font-extrabold text-slate-800 text-base border-b border-slate-100 pb-3">Daftar Jawaban Eksplorasi Solusi (SFBC) Konseli</h4>
                            
                            @if($material->questions->isEmpty())
                                <p class="text-sm text-slate-400 font-semibold italic text-center py-6">Belum ada pertanyaan refleksi untuk sesi ini.</p>
                            @else
                                <div class="grid grid-cols-1 gap-6">
                                    @foreach($material->questions->sortBy('order') as $q)
                                        @php
                                            $ansText = $answers[$q->id] ?? null;
                                            $sfbcStages = [
                                                'W' => ['badge' => '1', 'label' => 'Tahap 1: Tujuan'],
                                                'D' => ['badge' => '2', 'label' => 'Tahap 2: Penemuan Exception'],
                                                'S' => ['badge' => '3', 'label' => 'Tahap 3: Pelaksanaan Solusi'],
                                                'E' => ['badge' => '4', 'label' => 'Tahap 4: Scaling'],
                                                'P' => ['badge' => '5', 'label' => 'Tahap 5: Tugas'],
                                            ];
                                            $stepBadge = $sfbcStages[$q->category]['badge'] ?? '•';
                                            $stepLabel = $sfbcStages[$q->category]['label'] ?? 'Refleksi SFBC';
                                        @endphp
                                        <div class="p-3.5 sm:p-5 bg-slate-50 border border-slate-100 rounded-2xl sm:rounded-3xl space-y-3">
                                            <div class="flex items-center gap-2">
                                                <span class="w-6 h-6 rounded bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center flex-shrink-0">
                                                    {{ $stepBadge }}
                                                </span>
                                                <span class="text-xs font-extrabold text-slate-500">
                                                    {{ $stepLabel }}
                                                </span>
                                            </div>
                                            <p class="text-sm font-bold text-slate-800 leading-relaxed">{{ $q->text }}</p>
                                            
                                            <div class="p-3.5 sm:p-4 bg-white border border-slate-200/80 rounded-2xl min-h-[100px] shadow-sm">
                                                @if($ansText)
                                                    <p class="text-xs font-medium text-slate-700 leading-relaxed whitespace-pre-line">{!! e($ansText) !!}</p>
                                                @else
                                                    <p class="text-xs text-slate-400 font-semibold italic">Konseli belum menuliskan jawaban untuk pertanyaan ini.</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    @endif

</div>
@endsection

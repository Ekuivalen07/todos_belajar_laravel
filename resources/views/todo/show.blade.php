@extends('layouts.app')
@section('title', 'Detail Tugas')
@section('content')

<div class="bg-white border-4 border-slate-900 rounded-3xl p-6 sm:p-8 shadow-[8px_8px_0px_#0f172a] relative">
    <!-- Stud Balok Biru -->
    <div class="flex gap-3 justify-center mb-6">
        @for ($i = 0; $i < 6; $i++)
            <span class="w-5 h-5 rounded-full bg-blue-500 border-2 border-blue-700 lego-stud"></span>
        @endfor
    </div>

    <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b-4 border-slate-100">
        <h1 class="font-brick text-3xl sm:text-4xl text-slate-900">{{ $todo->title }}</h1>
        @if ($todo->is_completed)
            <span class="bg-emerald-400 text-slate-900 text-xs font-black px-4 py-1.5 rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                SELESAI
            </span>
        @else
            <span class="bg-amber-300 text-slate-900 text-xs font-black px-4 py-1.5 rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                BELUM SELESAI
            </span>
        @endif
    </div>

    <!-- Kotak Deskripsi -->
    <div class="my-6 bg-slate-50 border-4 border-slate-900 rounded-2xl p-5 shadow-[inset_0_2px_4px_rgba(0,0,0,0.06)]">
        <h3 class="font-brick text-slate-500 text-sm mb-2 uppercase tracking-wider">Catatan Rakitan:</h3>
        <p class="text-slate-700 font-semibold leading-relaxed whitespace-pre-line">
            {{ $todo->description ?: 'Tidak ada deskripsi pada tugas ini.' }}
        </p>
    </div>

    <!-- Tombol Navigasi -->
    <div class="flex items-center gap-3 pt-2">
        <a href="{{ route('todos.edit', $todo) }}"
           class="bg-yellow-400 hover:bg-yellow-300 text-slate-900 font-brick text-base px-6 py-2.5 rounded-2xl border-4 border-slate-900 shadow-[4px_4px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 transition-all">
            Edit Tugas
        </a>
        <a href="{{ route('todos.index') }}"
           class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-brick text-base px-6 py-2.5 rounded-2xl border-4 border-slate-900 shadow-[4px_4px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 transition-all">
            Kembali
        </a>
    </div>
</div>
@endsection

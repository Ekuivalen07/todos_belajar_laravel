@extends('layouts.app')
@section('title', 'Daftar Tugas')
@section('content')

<!-- Header Section -->
<div class="bg-white border-4 border-slate-900 rounded-3xl p-6 mb-8 shadow-[6px_6px_0px_#0f172a] relative overflow-hidden">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="font-brick text-3xl sm:text-4xl text-slate-900">Daftar Tugas</h1>
            <p class="text-slate-600 text-sm font-semibold mt-1">Susun misimu, kerjakan satu per satu, raih hasil sempurna!</p>
        </div>
        <a href="{{ route('todos.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-900 font-brick text-lg px-6 py-3 rounded-2xl border-4 border-slate-900 shadow-[4px_4px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 active:translate-y-1.5 transition-all">
            <span>+</span> Pasang Tugas Baru
        </a>
    </div>
</div>

<!-- List of Brick Cards -->
<div class="grid gap-5">
    @forelse ($todos as $todo)
    <article class="relative group bg-white border-4 border-slate-900 rounded-3xl p-5 shadow-[6px_6px_0px_#0f172a] hover:-translate-y-1 hover:shadow-[8px_8px_0px_#0f172a] transition-all">
        <!-- Baris Stud Dekoratif di atas Balok -->
        <div class="flex gap-3 mb-3">
            <span class="w-4 h-4 rounded-full {{ $todo->is_completed ? 'bg-emerald-400 border-emerald-600' : 'bg-blue-400 border-blue-600' }} border-2 lego-stud"></span>
            <span class="w-4 h-4 rounded-full {{ $todo->is_completed ? 'bg-emerald-400 border-emerald-600' : 'bg-blue-400 border-blue-600' }} border-2 lego-stud"></span>
            <span class="w-4 h-4 rounded-full {{ $todo->is_completed ? 'bg-emerald-400 border-emerald-600' : 'bg-blue-400 border-blue-600' }} border-2 lego-stud"></span>
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 flex-wrap">
                    <h2 class="font-brick text-xl text-slate-900 group-hover:text-blue-600 transition-colors">
                        <a href="{{ route('todos.show', $todo) }}">{{ $todo->title }}</a>
                    </h2>
                    @if ($todo->is_completed)
                        <span class="bg-emerald-400 text-slate-900 text-xs font-black px-3 py-1 rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                            TERPASANG SELESAI
                        </span>
                    @else
                        <span class="bg-amber-300 text-slate-900 text-xs font-black px-3 py-1 rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_#0f172a]">
                            MASIH DIRAKIT
                        </span>
                    @endif
                </div>
                @if ($todo->description)
                    <p class="text-slate-600 text-sm mt-2 line-clamp-1 font-semibold">{{ $todo->description }}</p>
                @endif
            </div>

            <!-- Tombol Aksi Balok -->
            <div class="flex items-center gap-2 pt-2 md:pt-0">
                <a href="{{ route('todos.show', $todo) }}"
                   class="bg-blue-500 hover:bg-blue-400 text-white font-brick text-sm px-3.5 py-1.5 rounded-xl border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 transition-all">
                    Detail
                </a>
                <a href="{{ route('todos.edit', $todo) }}"
                   class="bg-amber-400 hover:bg-amber-300 text-slate-900 font-brick text-sm px-3.5 py-1.5 rounded-xl border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 transition-all">
                    Edit
                </a>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Bongkar tugas ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-400 text-white font-brick text-sm px-3.5 py-1.5 rounded-xl border-2 border-slate-900 shadow-[3px_3px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-0.5 hover:translate-y-0.5 transition-all"
                            aria-label="Hapus tugas {{ $todo->title }}">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </article>
    @empty
    <div class="text-center py-16 bg-white border-4 border-dashed border-slate-400 rounded-3xl p-8">
        <div class="w-16 h-16 bg-yellow-300 border-4 border-slate-900 rounded-2xl mx-auto flex items-center justify-center font-brick text-3xl shadow-[4px_4px_0px_#0f172a] mb-3">
            🧱
        </div>
        <h3 class="font-brick text-2xl text-slate-900">Belum Ada Balok Tugas!</h3>
        <p class="text-slate-600 text-sm font-semibold mt-1">Mulai rakit proyek pertamamu sekarang juga.</p>
    </div>
    @endforelse
</div>
@endsection

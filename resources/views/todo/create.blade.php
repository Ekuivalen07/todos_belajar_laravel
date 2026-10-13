@extends('layouts.app')
@section('title', 'Tambah Tugas')
@section('content')

<div class="bg-white border-4 border-slate-900 rounded-3xl p-6 sm:p-8 shadow-[8px_8px_0px_#0f172a] relative">
    <!-- Stud Balok Atas -->
    <div class="flex gap-3 justify-center mb-6">
        @for ($i = 0; $i < 6; $i++)
            <span class="w-5 h-5 rounded-full bg-blue-500 border-2 border-blue-700 lego-stud"></span>
        @endfor
    </div>

    <h1 class="font-brick text-3xl text-slate-900 mb-6 text-center">Rakit Balok Tugas Baru</h1>

    <form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div>
            <label for="title" class="block font-brick text-lg text-slate-900 mb-2">
                Judul Tugas <span class="text-red-500 text-sm font-sans font-bold">(Wajib)</span>
            </label>
            <input id="title" name="title" type="text" maxlength="255" value="{{ old('title') }}" required
                   placeholder="Contoh: Belajar Routing Laravel"
                   class="w-full bg-amber-50 border-4 border-slate-900 rounded-2xl px-4 py-3 font-semibold text-slate-900 focus:outline-none focus:bg-white focus:ring-4 focus:ring-yellow-400 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] transition-all">
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block font-brick text-lg text-slate-900 mb-2">
                Deskripsi <span class="text-slate-500 text-sm font-sans font-bold">(Opsional)</span>
            </label>
            <textarea id="description" name="description" rows="4" maxlength="5000"
                      placeholder="Tuliskan catatan atau instruksi pengerjaan..."
                      class="w-full bg-amber-50 border-4 border-slate-900 rounded-2xl px-4 py-3 font-semibold text-slate-900 focus:outline-none focus:bg-white focus:ring-4 focus:ring-yellow-400 shadow-[inset_0_2px_4px_rgba(0,0,0,0.1)] transition-all">{{ old('description') }}</textarea>
        </div>

        <!-- Checkbox Status -->
        <div class="bg-amber-100 border-3 border-slate-900 rounded-2xl p-4 flex items-center gap-3">
            <input type="checkbox" id="is_completed" name="is_completed" value="1" @checked(old('is_completed', false))
                   class="w-6 h-6 rounded-lg text-emerald-500 border-3 border-slate-900 focus:ring-0 focus:ring-offset-0 cursor-pointer">
            <label for="is_completed" class="font-brick text-slate-900 text-base cursor-pointer select-none">
                Tandai sudah selesai dirakit
            </label>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                    class="flex-1 bg-emerald-500 hover:bg-emerald-400 text-white font-brick text-lg py-3 rounded-2xl border-4 border-slate-900 shadow-[4px_4px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 transition-all">
                Simpan Tugas
            </button>
            <a href="{{ route('todos.index') }}"
               class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-brick text-lg px-6 py-3 rounded-2xl border-4 border-slate-900 shadow-[4px_4px_0px_#0f172a] hover:shadow-[1px_1px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

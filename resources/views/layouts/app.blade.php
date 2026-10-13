<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daftar Tugas') — Brick Todo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-brick { font-family: 'Fredoka', sans-serif; }
        .lego-stud {
            box-shadow: inset 0 3px 2px rgba(255,255,255,0.55), 0 2px 3px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body class="bg-amber-50 min-h-screen text-slate-900 selection:bg-yellow-300 selection:text-black flex flex-col">
    <!-- Header Balok Merah -->
    <header class="bg-red-600 border-b-4 border-slate-900 sticky top-0 z-50">
        <!-- Deretan Stud LEGO di atas Header -->
        <div class="max-w-4xl mx-auto px-4 pt-2 flex justify-around opacity-90">
            @for ($i = 0; $i < 10; $i++)
                <span class="w-6 h-3 rounded-full bg-red-500 border-2 border-red-700 lego-stud"></span>
            @endfor
        </div>
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('todos.index') }}" class="group flex items-center gap-3">
                <span class="w-9 h-9 bg-yellow-400 border-2 border-slate-900 rounded-lg flex items-center justify-center font-brick text-2xl font-black text-slate-900 shadow-[2px_2px_0px_#0f172a] group-hover:rotate-6 transition-transform">
                    L
                </span>
                <span class="font-brick text-2xl text-white tracking-wide drop-shadow-[2px_2px_0px_#0f172a]">
                    BRICK<span class="text-yellow-300">TODO</span>
                </span>
            </a>
            <span class="hidden sm:inline-block bg-red-700 text-red-100 text-xs font-bold px-3 py-1 rounded-full border-2 border-slate-900">
                CRUD Laravel
            </span>
        </div>
    </header>

    <main class="max-w-3xl w-full mx-auto px-4 py-8 flex-1">
        <!-- Notifikasi Sukses (Balok Hijau) -->
        @if (session('success'))
        <div class="mb-6 bg-emerald-500 border-4 border-slate-900 rounded-2xl p-4 text-white font-bold shadow-[4px_4px_0px_#0f172a] flex items-center gap-3">
            <span class="w-7 h-7 rounded-full bg-emerald-400 border-2 border-emerald-700 lego-stud flex items-center justify-center text-slate-900 text-sm">✓</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Notifikasi Error (Balok Oranye/Merah) -->
        @if ($errors->any())
        <div class="mb-6 bg-amber-400 border-4 border-slate-900 rounded-2xl p-5 shadow-[4px_4px_0px_#0f172a]" role="alert">
            <strong class="font-brick text-lg text-slate-900 block mb-2">Ups, ada balok yang belum pas!</strong>
            <ul class="list-disc list-inside text-sm font-semibold text-slate-800 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="py-6 text-center text-xs font-bold text-slate-500 border-t-4 border-slate-900 bg-yellow-200">
        Latihan CRUD · Laravel 13 · Blade · SQLite
    </footer>
</body>

</html>

<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('code') - @yield('title') | SYS.COMMERCE</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#080c14] text-slate-200 min-h-screen flex flex-col justify-center items-center px-4 selection:bg-emerald-500/30 selection:text-emerald-300 antialiased">
    
    <div class="max-w-md w-full text-center">
        <!-- Badge Ikon -->
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl mb-6 shadow-2xl @yield('badge_style', 'bg-rose-500/10 border border-rose-500/30 text-rose-400 shadow-rose-950/50')">
            @yield('icon')
        </div>

        <!-- Kode Status & Judul -->
        <div class="space-y-2">
            <span class="text-xs font-mono font-bold tracking-widest uppercase px-3 py-1 rounded-full @yield('pill_style', 'text-rose-500 bg-rose-500/10 border border-rose-500/20')">
                HTTP @yield('code') Error
            </span>
            <h1 class="text-3xl font-extrabold text-slate-100 tracking-tight font-sans mt-3">
                @yield('title')
            </h1>
        </div>

        <!-- Card Deskripsi -->
        <div class="mt-6 p-5 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-xl text-left">
            <div class="flex items-center gap-2 mb-2 pb-2 border-b border-slate-800">
                <div class="w-2.5 h-2.5 rounded-full @yield('dot_style', 'bg-rose-500 animate-pulse')"></div>
                <span class="text-xs font-mono font-semibold text-slate-400">@yield('status_label', 'System Notification')</span>
            </div>
            
            <p class="text-xs text-slate-300 font-sans leading-relaxed">
                @yield('message')
            </p>

            @auth
                <div class="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-between text-[11px] font-mono">
                    <span class="text-slate-400">Sesi Akun:</span>
                    <span class="px-2 py-0.5 rounded bg-slate-800 text-slate-200 border border-slate-700">
                        {{ auth()->user()->email }} ({{ strtoupper(auth()->user()->role) }})
                    </span>
                </div>
            @endauth
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('products.index') }}" class="w-full sm:w-auto px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold font-sans rounded-xl transition shadow-lg shadow-emerald-950">
                ← Kembali ke Katalog
            </a>
            <button onclick="window.history.back()" class="w-full sm:w-auto px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold font-sans rounded-xl border border-slate-700 transition">
                Halaman Sebelumnya
            </button>
        </div>

        <p class="mt-8 text-[11px] text-slate-600 font-sans">
            Tugas Rutin 11 — E-Commerce DB + Secure Auth | Tengku Fahreza
        </p>
    </div>

</body>
</html>
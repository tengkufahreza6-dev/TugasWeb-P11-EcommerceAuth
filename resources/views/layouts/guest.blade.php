<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SYS_COMMERCE') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans antialiased bg-[#080c14] text-slate-200 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 selection:bg-emerald-500/30 selection:text-emerald-300">
        <div class="w-full sm:max-w-md flex flex-col items-center mb-6">
            <a href="{{ route('products.index') }}" class="flex items-center gap-2 group">
                <span class="text-2xl font-black tracking-tight text-white group-hover:text-emerald-400 transition">
                    SYS<span class="text-emerald-500">.COMMERCE</span>
                </span>
            </a>
            <p class="text-xs text-slate-400 mt-1">E-Commerce & Role-Based Authentication System</p>
        </div>

        <div class="w-full sm:max-w-md p-6 sm:p-8 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-2xl">
            {{ $slot }}
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('products.index') }}" class="text-xs text-slate-400 hover:text-emerald-400 transition font-sans">
                ← Kembali ke Katalog Produk
            </a>
        </div>
    </body>
</html>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
                Verifikasi Otoritas Admin
            </h2>
            <a href="{{ route('products.index') }}" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-sans text-xs font-bold rounded-lg transition border border-slate-700">
                ← Kembali ke Katalog
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#0f172a] border border-emerald-500/40 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-emerald-950/30 text-center relative overflow-hidden">
            
            <!-- Glow background effect -->
            <div class="absolute -top-24 -left-24 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Badge Ikon Sukses / Gembok Terbuka -->
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 mb-5 shadow-xl shadow-emerald-950/50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                </svg>
            </div>

            <div class="space-y-1 mb-6">
                <span class="text-xs font-mono font-bold tracking-widest text-emerald-400 uppercase px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30">
                    Otorisasi Terverifikasi: 200 OK
                </span>
                <h1 class="text-2xl font-bold text-slate-100 font-sans pt-2">
                    Akses Otoritas Diberikan
                </h1>
                <p class="text-xs text-slate-400 font-sans">
                    Identitas akun Anda terverifikasi sebagai <strong class="text-emerald-400 font-mono">ADMINISTRATOR</strong> dengan hak istimewa penuh.
                </p>
            </div>

            <!-- Card Informasi Data yang Ditargetkan -->
            <div class="p-4 bg-[#080c14] border border-slate-800 rounded-2xl text-left mb-6 font-sans">
                <div class="flex items-center justify-between pb-3 border-b border-slate-800 text-xs">
                    <span class="text-slate-400">Target Entitas:</span>
                    <span class="font-mono text-emerald-400 font-bold">Product #{{ $product->id }}</span>
                </div>
                <div class="py-3 flex items-center gap-3">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="" class="w-12 h-12 rounded-lg object-cover border border-slate-800 shrink-0">
                    @endif
                    <div>
                        <h4 class="font-bold text-slate-100 text-xs line-clamp-1">{{ $product->name }}</h4>
                        <p class="text-[11px] font-mono text-slate-400 mt-0.5">Rp {{ number_format($product->price, 0, ',', '.') }} | Stok: {{ $product->stock }}</p>
                    </div>
                </div>
                <div class="pt-3 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono">
                    <span class="text-slate-500">Tindakan Khusus:</span>
                    <span class="text-rose-400 font-semibold uppercase">Permanent Deletion Privilege</span>
                </div>
            </div>

            <!-- Tombol Aksi Hapus Nyata atau Batalkan -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="w-full sm:w-auto" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini dari database?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold font-sans rounded-xl transition shadow-lg shadow-rose-950 flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Eksekusi Hapus Produk Ini
                    </button>
                </form>

                <a href="{{ route('products.index') }}" class="w-full sm:w-auto px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold font-sans rounded-xl border border-slate-700 transition">
                    Batalkan & Kembali
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
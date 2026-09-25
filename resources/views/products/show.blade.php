<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
           <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
    Detail Produk
</h2>
            <a href="{{ route('products.index') }}" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-mono text-xs font-bold rounded-lg transition border border-slate-700">
                ← Kembali ke Katalog
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#0f172a] border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-xl grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Gambar Produk / Placeholder -->
            <div class="flex flex-col items-center justify-center bg-[#080c14] border border-slate-800 rounded-xl overflow-hidden p-4">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto max-h-80 object-cover rounded-lg shadow">
                @else
                    <div class="py-16 text-center">
                        <span class="text-4xl">📦</span>
                        <p class="text-xs font-mono text-slate-500 mt-2">Tidak Ada Gambar Produk</p>
                    </div>
                @endif
            </div>

            <!-- Detail Informasi Produk -->
            <div class="flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-mono font-bold uppercase px-2.5 py-1 rounded bg-blue-500/10 text-blue-400 border border-blue-500/20">
                            {{ $product->category->name }}
                        </span>
                        <span class="text-xs font-mono text-slate-400">Stok Tersedia: <strong class="text-slate-200">{{ $product->stock }}</strong></span>
                    </div>

                    <h1 class="text-2xl font-bold text-slate-100 font-sans leading-tight mt-1">
                        {{ $product->name }}
                    </h1>

                    <div class="mt-4 py-3 border-y border-slate-800">
                        <span class="text-xs text-slate-500 font-mono block">Harga Satuan</span>
                        <span class="text-2xl font-bold font-mono text-emerald-400">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-xs font-mono uppercase text-slate-400 font-bold mb-1">Deskripsi Produk:</h3>
                        <p class="text-xs text-slate-300 font-sans leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                <!-- Action Button untuk Admin & Editor -->
                @auth
                    <div class="mt-6 pt-4 border-t border-slate-800 flex items-center gap-3 font-mono text-xs">
                        @can('update', $product)
                            <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-xl font-bold hover:bg-amber-500/20 transition">
                                Edit Data Produk
                            </a>
                        @endcan

                        @can('delete', $product)
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-rose-500/10 text-rose-400 border border-rose-500/30 rounded-xl font-bold hover:bg-rose-500/20 transition">
                                    Hapus Produk
                                </button>
                            </form>
                        @endcan
                    </div>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
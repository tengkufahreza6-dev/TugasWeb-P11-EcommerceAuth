<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <!-- Judul Bersih Tanpa SYS_COMMERCE // -->
                <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
                    Katalog Produk
                </h2>
                <p class="text-xs text-slate-400 font-sans mt-1">Eksplorasi seluruh komponen hardware dan peralatan teknologi.</p>
            </div>
            
            @auth
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-bold uppercase tracking-wider">
                        Role: {{ auth()->user()->role }}
                    </span>
                    @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-sans text-xs font-bold rounded-lg transition shadow-lg shadow-emerald-950">
                            + Tambah Produk Baru
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl font-sans text-xs flex items-center justify-between">
                <span>✓ {{ session('success') }}</span>
            </div>
        @endif

        <!-- Filter & Search Bar -->
<div class="mb-8 p-4 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-xl">
    <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-3">
        <!-- Input Pencarian + Tombol Cari Eksplisit -->
        <div class="relative flex items-center w-full md:w-auto md:flex-1">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari nama perangkat atau spesifikasi..." 
                class="w-full bg-[#080c14] border border-slate-800 rounded-xl pl-3.5 pr-20 py-2.5 text-xs text-slate-200 placeholder-slate-500 font-sans focus:outline-none focus:border-emerald-500 transition"
            >
            <button 
                type="submit" 
                class="absolute right-1 px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-500 text-white font-sans text-xs font-bold rounded-lg transition shadow flex items-center gap-1"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <span>Cari</span>
            </button>
        </div>

        <!-- Dropdown Filter Kategori -->
        <div class="flex items-center gap-2 w-full md:w-auto">
            <select name="category" class="w-full md:w-56 bg-[#080c14] border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-slate-200 font-sans focus:outline-none focus:border-emerald-500">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-sans font-bold rounded-xl border border-slate-700 transition shrink-0">
                Filter
            </button>

            @if(request('search') || request('category'))
                <a href="{{ route('products.index') }}" class="px-3.5 py-2.5 bg-rose-950/40 hover:bg-rose-900/50 text-rose-300 text-xs font-sans font-semibold rounded-xl border border-rose-800 text-center transition shrink-0">
                    Reset
                </a>
            @endif
        </div>
    </form>
</div>

        <!-- Grid Produk Modern Dengan Gambar Presisi -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-[#0f172a] border border-slate-800/80 hover:border-emerald-500/40 rounded-2xl p-4 shadow-lg flex flex-col justify-between transition-all duration-200 group">
                    <div>
                        <!-- Display Thumbnail Gambar -->
                        <div class="w-full h-44 bg-[#080c14] border border-slate-800 rounded-xl overflow-hidden mb-3 relative group-hover:border-emerald-500/30 transition">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-600 font-sans text-xs">
                                    Tidak Ada Gambar
                                </div>
                            @endif
                            <span class="absolute top-2 left-2 text-[10px] font-sans font-bold uppercase px-2.5 py-0.5 rounded-full bg-slate-950/80 text-blue-400 border border-blue-500/30 backdrop-blur-sm">
                                {{ $product->category->name }}
                            </span>
                        </div>

                        <!-- Header Info Stok -->
                        <div class="flex items-center justify-between gap-2 mb-1.5">
                            <span class="text-[11px] font-sans text-slate-400">Stok: <strong class="text-slate-200">{{ $product->stock }}</strong></span>
                        </div>

                        <!-- Nama Produk -->
                        <h3 class="font-bold text-slate-100 text-sm font-sans line-clamp-2 leading-snug group-hover:text-emerald-400 transition">
                            {{ $product->name }}
                        </h3>

                        <!-- Deskripsi Produk -->
                        <p class="text-xs text-slate-400 mt-1.5 line-clamp-2 font-sans leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Footer Card (Harga & Tombol) -->
                    <div class="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-between gap-2">
                        <div>
                            <span class="text-[10px] text-slate-500 font-sans block">Harga Satuan</span>
                            <span class="text-sm font-bold font-mono text-emerald-400">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex items-center gap-1.5 font-sans text-xs">
                            <a href="{{ route('products.show', $product->id) }}" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-lg transition border border-slate-700 font-semibold">
                                Detail
                            </a>
                            
                            @auth
                                @can('update', $product)
                                    <a href="{{ route('products.edit', $product->id) }}" class="px-2.5 py-1.5 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-lg hover:bg-amber-500/20 transition font-semibold">
                                        Edit
                                    </a>
                                @endcan

                                @can('delete', $product)
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-rose-500/10 text-rose-400 border border-rose-500/20 rounded-lg hover:bg-rose-500/20 transition font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                @endcan
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-[#0f172a] border border-slate-800 rounded-2xl">
                    <p class="text-slate-400 font-sans text-xs">Tidak ada data produk ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
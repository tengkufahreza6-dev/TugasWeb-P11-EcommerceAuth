<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
                Edit Data Produk
            </h2>
            <a href="{{ route('products.index') }}" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-sans text-xs font-bold rounded-lg transition border border-slate-700">
                ← Batal
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#0f172a] border border-slate-800 p-6 rounded-2xl shadow-xl">
            <!-- Alert Global Error jika ada kesalahan validasi -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/30 rounded-xl text-rose-400 font-sans text-xs">
                    <strong class="font-bold block mb-1">Gagal Memperbarui Data:</strong>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4 font-sans text-xs">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div>
                    <label class="block text-slate-300 mb-1 font-bold">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500" required>
                    @error('name')
                        <span class="text-rose-400 text-[11px] mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Kategori Produk -->
                    <div>
                        <label class="block text-slate-300 mb-1 font-bold">Kategori Produk</label>
                        <select name="category_id" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-rose-400 text-[11px] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Harga Satuan -->
                    <div>
                        <label class="block text-slate-300 mb-1 font-bold">Harga Satuan (Rp)</label>
                        <input type="number" min="0" step="1000" name="price" value="{{ old('price', (int)$product->price) }}" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500" required>
                        @error('price')
                            <span class="text-rose-400 text-[11px] mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Jumlah Stok -->
                <div>
                    <label class="block text-slate-300 mb-1 font-bold">Jumlah Stok</label>
                    <input type="number" min="0" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500" required>
                    @error('stock')
                        <span class="text-rose-400 text-[11px] mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div>
                    <label class="block text-slate-300 mb-1 font-bold">Deskripsi Produk</label>
                    <textarea name="description" rows="4" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 font-sans focus:outline-none focus:border-emerald-500" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-rose-400 text-[11px] mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <a href="{{ route('products.index') }}" class="px-4 py-2.5 bg-slate-800 text-slate-300 rounded-xl font-bold">Batal</a>
                    <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl transition shadow-lg shadow-emerald-950">
                        Perbarui Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
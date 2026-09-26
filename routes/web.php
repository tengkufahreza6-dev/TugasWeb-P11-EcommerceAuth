<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Redirect Halaman Utama ke Katalog Produk
Route::get('/', function () {
    return redirect()->route('products.index');
});

// 2. Katalog Produk (Publik/Guest)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 3. Rute Terproteksi Autentikasi Login (User, Editor, Admin)
Route::middleware('auth')->group(function () {
    // Manajemen Profil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard diarahkan ke Katalog
    Route::get('/dashboard', function () {
        return redirect()->route('products.index');
    })->name('dashboard');

    // CRUD Produk: Khusus Admin & Editor
    Route::middleware('role:admin,editor')->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    });

    // Wewenang Khusus Admin: Hapus Produk & Halaman Verifikasi Otoritas
    Route::middleware('role:admin')->group(function () {
        // Rute Eksekusi Hapus yang dicari oleh index.blade.php
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
        // Rute Khusus Pengujian Bukti Tugas Admin
        Route::get('/test-delete-product/{product}', function (\App\Models\Product $product) {
            return view('admin.authorized-delete', compact('product'));
        })->name('admin.test-delete');
    });
});

// 4. Detail Produk (Ditaruh di paling bawah agar tidak memotong /products/create)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
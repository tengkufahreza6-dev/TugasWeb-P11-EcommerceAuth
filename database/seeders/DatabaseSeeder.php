<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 3 Akun Utama Berdasarkan Role (Kebutuhan Pengujian Auth TR 11)
        User::create([
            'name' => 'Admin System',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Content Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Tengku Fahreza',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        // 2. Buat Kategori Produk
        $categories = [
            ['name' => 'Perangkat Komputer', 'slug' => 'perangkat-komputer'],
            ['name' => 'Aksesoris Audio', 'slug' => 'aksesoris-audio'],
            ['name' => 'Komponen Jaringan', 'slug' => 'komponen-jaringan'],
            ['name' => 'Peralatan Kantor', 'slug' => 'peralatan-kantor'],
            ['name' => 'Gadget & Smartphone', 'slug' => 'gadget-smartphone'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 3. Generasi 55 Produk Realistis Menggunakan Factory
        Product::factory(55)->create();
    }
}
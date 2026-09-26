<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
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
        $admin = User::create([
            'name' => 'Admin System',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $editor = User::create([
            'name' => 'Content Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('password'),
        ]);

        $regularUser = User::create([
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

        // 4. Otomatis Buat Riwayat Order Dummy (Untuk Kebutuhan Pengujian Query Eloquent 4 & 5)
        $sampleProduct1 = Product::first();
        $sampleProduct2 = Product::skip(1)->first();

        $order = Order::create([
            'user_id' => $regularUser->id,
            'order_number' => 'ORD-TR11-' . strtoupper(Str::random(6)),
            'total_amount' => ($sampleProduct1->price * 1) + ($sampleProduct2->price * 2),
            'status' => 'completed',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $sampleProduct1->id,
            'quantity' => 1,
            'price' => $sampleProduct1->price,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $sampleProduct2->id,
            'quantity' => 2,
            'price' => $sampleProduct2->price,
        ]);
    }
}
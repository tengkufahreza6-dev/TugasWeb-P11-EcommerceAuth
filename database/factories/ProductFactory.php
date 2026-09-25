<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Pemetaan Gambar Presisi Berdasarkan Jenis Perangkat
        $catalogMap = [
            'Mechanical Keyboard' => [
                'brands' => ['Logitech G', 'Razer', 'Corsair', 'Keychron', 'Fantech'],
                'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=600&q=80'
            ],
            'Gaming Mouse' => [
                'brands' => ['Logitech G', 'Razer', 'SteelSeries', 'Glorious', 'Fantech'],
                'image' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600&q=80'
            ],
            'Wireless Headset' => [
                'brands' => ['HyperX', 'Razer', 'Corsair', 'Sony', 'Logitech G'],
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80'
            ],
            'Monitor Gaming 24 Inch' => [
                'brands' => ['ASUS ROG', 'LG UltraGear', 'Samsung Odyssey', 'AOC', 'MSI'],
                'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=600&q=80'
            ],
            'Router Wi-Fi 6' => [
                'brands' => ['MikroTik', 'TP-Link', 'ASUS', 'Tenda', 'Netgear'],
                'image' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'
            ],
            'NVMe SSD 1TB' => [
                'brands' => ['Samsung PRO', 'Kingston', 'ADATA XPG', 'Crucial', 'WD Black'],
                'image' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?auto=format&fit=crop&w=600&q=80'
            ],
        ];

        $itemType = fake()->randomElement(array_keys($catalogMap));
        $selectedMap = $catalogMap[$itemType];
        $brand = fake()->randomElement($selectedMap['brands']);
        $modelNum = fake()->bothify('??-###');
        
        $fullName = "{$brand} {$itemType} {$modelNum}";

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'name' => $fullName,
            'slug' => Str::slug($fullName) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'description' => "Perangkat {$itemType} garansi resmi dari {$brand}. Menawarkan performa tinggi, durabilitas maksimal, dan kenyamanan pemakaian jangka panjang.",
            'price' => fake()->numberBetween(250, 4500) * 1000,
            'stock' => fake()->numberBetween(10, 85),
            'is_active' => true,
            'image' => $selectedMap['image'],
        ];
    }
}
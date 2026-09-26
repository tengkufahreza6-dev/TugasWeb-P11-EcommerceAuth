<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Pemetaan beberapa variasi gambar Unsplash unik per jenis perangkat
        $catalogMap = [
            'Mechanical Keyboard' => [
                'brands' => ['Logitech G', 'Razer', 'Corsair', 'Keychron', 'VortexSeries', 'Ducky'],
                'images' => [
                    'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1618384887929-16ec33fab9ef?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'Gaming Mouse' => [
                'brands' => ['Logitech G', 'Razer', 'SteelSeries', 'Glorious', 'Pulsar', 'Zowie'],
                'images' => [
                    'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1605773527852-c546a8584ea3?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'Wireless Headset' => [
                'brands' => ['HyperX', 'Razer', 'Sony', 'Audio-Technica', 'Sennheiser', 'SteelSeries'],
                'images' => [
                    'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1546435770-a3e426bf472b?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'Monitor Gaming 24 Inch' => [
                'brands' => ['ASUS ROG', 'LG UltraGear', 'Samsung Odyssey', 'AOC', 'MSI', 'BenQ'],
                'images' => [
                    'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1585792180666-f7347c490ee2?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1551645120-d70bfe84c826?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'Laptop & Ultrabook' => [
                'brands' => ['Apple MacBook', 'Dell XPS', 'ASUS Zenbook', 'Lenovo ThinkPad', 'HP Spectre'],
                'images' => [
                    'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1603302576837-37561b2e2302?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'Router Wi-Fi 6' => [
                'brands' => ['MikroTik', 'TP-Link', 'ASUS ROG', 'Tenda', 'Netgear'],
                'images' => [
                    'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80',
                ]
            ],
            'NVMe SSD & Komponen' => [
                'brands' => ['Samsung PRO', 'Kingston', 'ADATA XPG', 'Crucial', 'WD Black'],
                'images' => [
                    'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=600&q=80',
                ]
            ],
        ];

        $itemType = fake()->randomElement(array_keys($catalogMap));
        $selectedMap = $catalogMap[$itemType];
        $brand = fake()->randomElement($selectedMap['brands']);
        $modelNum = fake()->bothify('??-###');
        
        $fullName = "{$brand} {$itemType} {$modelNum}";
        
        // Pilih gambar acak dari daftar gambar jenis barang tersebut
        $baseImage = fake()->randomElement($selectedMap['images']);
        // Beri parameter unik agar browser dan CDN memperlakukan gambarnya sebagai asset unik
        $uniqueImage = $baseImage . '&random=' . fake()->unique()->numberBetween(1, 99999);

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'name' => $fullName,
            'slug' => Str::slug($fullName) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'description' => "Perangkat {$itemType} garansi resmi dari {$brand}. Menawarkan performa tinggi, durabilitas maksimal, dan kenyamanan pemakaian jangka panjang.",
            'price' => fake()->numberBetween(250, 4500) * 1000,
            'stock' => fake()->numberBetween(10, 85),
            'is_active' => true,
            'image' => $uniqueImage,
        ];
    }
}
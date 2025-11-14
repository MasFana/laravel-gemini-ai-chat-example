<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [];
        for ($i = 1; $i <= 100; $i++) {
            $products[] = [
                'name' => "Laptop Testing $i",
                'brand' => fake()->randomElement(['Asus', 'Acer', 'Lenovo', 'HP', 'Dell', 'MSI', 'Apple']),
                'processor' => fake()->randomElement(['Intel i5', 'Intel i7', 'Intel i9', 'AMD Ryzen 5', 'AMD Ryzen 7', 'Apple M1']),
                'ram' => fake()->randomElement(['8GB', '16GB', '32GB']),
                'storage' => fake()->randomElement(['256GB SSD', '512GB SSD', '1TB SSD', '2TB HDD']),
                'gpu' => fake()->randomElement(['Intel Iris Xe', 'NVIDIA RTX 3050', 'NVIDIA RTX 3060', 'AMD Radeon', 'Apple GPU']),
                'screen' => fake()->randomElement(['13.3" FHD', '14" FHD', '15.6" FHD', '16" Retina']),
                'price' => fake()->numberBetween(7000000, 35000000),
                'description' => fake()->sentence(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Product::insert($products);
    }
}

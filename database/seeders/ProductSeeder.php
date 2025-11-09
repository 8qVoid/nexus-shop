<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Laptop HP',
            'price' => 35000,
            'description' => 'HP Pavilion 15.6" Laptop',
            'image' => 'https://via.placeholder.com/180x120?text=Laptop+HP'
        ]);

        Product::create([
            'name' => 'Smartphone Samsung',
            'price' => 15000,
            'description' => 'Samsung Galaxy S22',
            'image' => 'https://via.placeholder.com/180x120?text=Samsung+Phone'
        ]);

        Product::create([
            'name' => 'Wireless Mouse',
            'price' => 500,
            'description' => 'Logitech Wireless Mouse',
            'image' => 'https://via.placeholder.com/180x120?text=Mouse'
        ]);
    }
}

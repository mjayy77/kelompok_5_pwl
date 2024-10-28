<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Contoh data produk yang akan diisi
        $products = [
            [
                'name' => 'Produk 1',
                'price' => 100.00,
                'description' => 'Deskripsi produk 1.'
            ],
            [
                'name' => 'Produk 2',
                'price' => 200.00,
                'description' => 'Deskripsi produk 2.'
            ],
            [
                'name' => 'Produk 3',
                'price' => 300.00,
                'description' => 'Deskripsi produk 3.'
            ],
            // Tambahkan produk lain sesuai kebutuhan
        ];

        // Loop untuk menambahkan setiap produk
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

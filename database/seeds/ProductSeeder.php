<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => 'Majoo Paket Advance',
                'slug' => 'majoo-paket-advance',
                'price' => 50000,
                'stock' => 20,
                'picture' => 'paket-advance.png',
                'description' => 'Majoo Paket Advance'
            ],
            [
                'product_name' => 'Majoo Paket Desktop',
                'slug' => 'majoo-paket-desktop',
                'price' => 150000,
                'stock' => 20,
                'picture' => 'paket-desktop.png',
                'description' => 'Majoo Paket Desktop'
            ],
            [
                'product_name' => 'Majoo Paket Lifestyle',
                'slug' => 'majoo-paket-lifestyle',
                'price' => 20000,
                'stock' => 20,
                'picture' => 'paket-lifestyle.png',
                'description' => 'Majoo Paket Lifestyle'
            ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}

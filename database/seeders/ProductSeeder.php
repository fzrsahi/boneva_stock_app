<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = ['Boneva Gelas', 'Boneva Galon', "Boneva Botol"];
        foreach ($products as $product) {
            Product::create([
                'name' => $product,
                'amount' => fake()->randomNumber(),
                'price' => fake()->randomNumber(),
                'category' => fake()->randomElement(['0', '1']),
            ]);
        }
    }
}

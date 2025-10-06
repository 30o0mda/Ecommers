<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1 ; $i <= 25 ; $i++){
            Product::create(
                [
                    'name' => 'product'.$i,
                    'description' => 'this is product number'.$i,
                    'price' => rand(20,100),
                    'quantity' => rand(1,50),
                    'category_id' => rand(1,6),
                    'image_path'=>'',
                ]
                );
        }
    }
}

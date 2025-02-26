<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clothing_items')->insert([
            [
                'name' => 'Black T-shirt',
                'category' => 'Tops',
                'image' => 'storage/clothing-images/shirt3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Navy Blue Jeans',
                'category' => 'Bottoms',
                'image' => 'storage/clothing-images/trouser2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'White Sneakers',
                'category' => 'Shoes',
                'image' => 'storage/clothing-images/shoes3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

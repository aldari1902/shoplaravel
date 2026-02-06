<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Clou rouillé',
                'description' => 'Vieux clou rouillé trouvé par terre',
                'price' => 249.99,
                'stock' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'La signature de Martin',
                'description' => 'On est pas sur qu elle existe réellement',
                'price' => 19.99,
                'stock' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

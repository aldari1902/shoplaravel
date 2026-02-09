<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Ceinture',
                'description' => 'Une super ceinture',
                'category' => 'vêtements',
                'stockQuantity' => 49,
                'price' => 49.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Caleçon',
                'description' => 'Un super Caleçon',
                'category' => 'vêtements',
                'stockQuantity' => 12,
                'price' => 27.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Chaussette',
                'description' => 'Une super Chaussette',
                'category' => 'vêtements',
                'stockQuantity' => 94,
                'price' => 9.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sac à main',
                'description' => 'Un super Sac à main',
                'category' => 'vêtements',
                'stockQuantity' => 4,
                'price' => 249.99,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

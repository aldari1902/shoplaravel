<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Rock',
                'slug' => 'rock',
                'description' => 'Du Rock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hard Rock',
                'slug' => 'hard-rock',
                'description' => 'Du Hard Rock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Metal',
                'slug' => 'metal',
                'description' => 'Du Metal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Techno',
                'slug' => 'techno',
                'description' => 'De la techno',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pop',
                'slug' => 'pop',
                'description' => 'De la pop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'R&B',
                'slug' => 'r-b',
                'description' => 'Du R&B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Classic',
                'slug' => 'classic',
                'description' => 'Du Classic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}

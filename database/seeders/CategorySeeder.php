<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'id' => 1,
                'name' => 'Adulte',
            ],
            [
                'id' => 2,
                'name' => 'Enfant',
            ]
        ]);
    }
}

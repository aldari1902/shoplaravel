<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Adulte',
                'description' => 'Pour les adultes',
            ],
            [
                'name' => 'Enfant',
                'description' => 'Pour les enfants',
            ]
        ]);
    }
}

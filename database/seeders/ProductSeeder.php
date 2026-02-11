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
                'name' => 'L Etoile de la mort',
                'description' => '#75419',
                'category' => '1',
                'stock' => 49,
                'price' => 999.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Le croiseur d assault de classe Venator de la République',
                'description' => '#75367',
                'category' => '1',
                'stock' => 12,
                'price' => 649.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Logo de Star Wars™ en briques',
                'description' => '#75407',
                'category' => '1',
                'stock' => 94,
                'price' => 69.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Destroyer stellaire de classe Impérial',
                'description' => '#75394',
                'category' => '1',
                'stock' => 4,
                'price' => 169.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Millennium Falcon',
                'description' => '#75192',
                'category' => '1',
                'stock' => 94,
                'price' => 849.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Le vaisseau de classe Firespray de Jango Fett',
                'description' => '#75409',
                'category' => '1',
                'stock' => 94,
                'price' => 299.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Le croiseur d’assaut de classe Venator',
                'description' => '#75441',
                'category' => '2',
                'stock' => 94,
                'price' => 79.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SMART Play™ : le Landspeeder™ de Luke',
                'description' => '#75420',
                'category' => '2',
                'stock' => 94,
                'price' => 39.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'SMART Play™ : le TIE Fighter™ de Dark Vador',
                'description' => '#75421',
                'category' => '2',
                'stock' => 94,
                'price' => 69.99,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Le speeder bike du Mandalorien et Grogu',
                'description' => '#75436',
                'category' => '2',
                'stock' => 0,
                'price' => 9.99,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'System',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::create([
            'first_name' => 'Jean',
            'last_name' => 'Dupont',
            'email' => 'jean.dupont@bridge.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'first_name' => 'Patoche',
            'last_name' => 'Létoiledemère',
            'email' => 'letoile@star.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'first_name' => 'Jackie',
            'last_name' => 'Michel',
            'email' => 'lejclem@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}

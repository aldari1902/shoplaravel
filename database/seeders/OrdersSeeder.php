<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('is_admin', false)->get();
        //En attente
        Order::create([
            'user_id' => $users[0]->id,
            'total' => 269.98,
            'status' => 'pending',
        ]);
        //Payée
        Order::create([
            'user_id' => $users[2]->id,
            'total' => 69.69,
            'status' => 'paid',
        ]);
        //Expédiée
        Order::create([
            'user_id' => $users[1]->id,
            'total' => 19.02,
            'status' => 'shipped',
        ]);
        //Livrée
        Order::create([
            'user_id' => $users[1]->id,
            'total' => 25.03,
            'status' => 'delivered',
        ]);
        //Annulée
        Order::create([
            'user_id' => $users[1]->id,
            'total' => 99.99,
            'status' => 'canceled',
        ]);
    }
}

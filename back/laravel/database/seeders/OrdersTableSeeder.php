<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $cantidad = 20;

        for ($i = 0; $i < $cantidad; $i++) {
            DB::table("orders")->insert([
                "cliente_id" => 11,
                "estat" => $faker->numberBetween(1,5),
                'total' => $faker->randomFloat(2, 5, 1000),
                'tipo_envio' => $faker->numberBetween(1, 2),
                'tipo_pago' => $faker->numberBetween(1, 2),
                'created_at' => now(),
            ]);
        }
    }
}

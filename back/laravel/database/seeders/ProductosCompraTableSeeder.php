<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductosCompraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $cantidad = 30;

        for ($i=0; $i <$cantidad; $i++) { 
            DB::table("producto_orders")->insert([
                "order_comercio_id" => ($i % 20) + 1,
                "producto_id" => $faker->numberBetween(1,30),
                "cantidad" => $faker->numberBetween(1,10),
                "precio" => $faker->randomFloat(2, 5, 100),
            ]);
        }
    }
}

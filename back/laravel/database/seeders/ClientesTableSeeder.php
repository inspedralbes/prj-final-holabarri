<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $cantidad = 7;

        for ($i = 0; $i < $cantidad; $i++) {
            DB::table("cliente")->insert([
                "name" => $faker->name,
                "apellidos" => $faker->lastName(),
                "email" => $faker->unique()->safeEmail,
                "phone" => "603" . $faker->numberBetween(100000, 999999),
                'password' => Hash::make(value: "12345678"),
                "street_address" => $faker->streetAddress(),
                "ciudad" => "Castelldefels",
                "provincia" => "Barcelona",
                "codigo_postal" => $faker->numberBetween(00000, 99999),
                "numero_planta" => $faker->numberBetween(1, 10),
                "numero_puerta" => $faker->numberBetween(1, 99),
            ]);
        }
        DB::table("cliente")->insert([
            "name" => "Agustín Enzo",
            "apellidos" => "Noviello",
            "email" => "a23agunovnov@inspedralbes.cat",
            "phone" => "603397347",
            'password' => Hash::make(value: "perseverar"),
            "street_address" => "Carrer Confiança 32",
            "ciudad" => "Castelldefels",
            "provincia" => "Barcelona",
            "codigo_postal" => "08860",
            "numero_planta" => 1,
            "numero_puerta" => 1,
        ]);
        DB::table("cliente")->insert([
            "name" => "Pacho Lacalle",
            "apellidos" => "Lobarrio",
            "email" => "comercio@comercio.cat",
            "phone" => "123456789",
            'password' => Hash::make(value: "objetivos"),
            "street_address" => "Carrer Confiança 32",
            "ciudad" => "Castelldefels",
            "provincia" => "Barcelona",
            "codigo_postal" => "08860",
            "numero_planta" => 1,
            "numero_puerta" => 1,
        ]);
        DB::table("cliente")->insert([
            "name" => "Lorenzo",
            "apellidos" => "Moll",
            "email" => "lorenzo@gmail.com",
            "phone" => "603397347",
            'password' => Hash::make(value: "12345678"),
            "street_address" => "Carrer Confiança 32",
            "ciudad" => "Ciutadella",
            "provincia" => "Menorca",
            "codigo_postal" => "07760",
            "numero_planta" => 1,
            "numero_puerta" => 1,
        ]);
    }
}

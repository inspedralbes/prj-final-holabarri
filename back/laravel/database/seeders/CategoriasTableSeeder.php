<?php
namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriasTableSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ["name" => "Indumentaria", "imagenes" => "https://www.svgrepo.com/show/438391/clothes.svg"],
            ["name" => "Tecnología", "imagenes" => "https://www.svgrepo.com/show/394288/mobile.svg"],
            ["name" => "Hogar", "imagenes" => "https://www.svgrepo.com/show/500894/home.svg"],
            ["name" => "Cosméticos", "imagenes" => "https://www.svgrepo.com/show/220295/cosmetics.svg"],
            ["name" => "Jugueterías", "imagenes" => "https://www.svgrepo.com/show/127406/toy-train.svg"],
            ["name" => "Ferreterías", "imagenes" => "https://www.svgrepo.com/show/393298/hardware.svg"],
            ["name" => "Librerías", "imagenes" => "https://www.svgrepo.com/show/327322/library.svg"],
            ["name" => "Farmacias", "imagenes" => "https://www.svgrepo.com/show/399495/health-services.svg"],
            ["name" => "Zapaterías", "imagenes" => "https://www.svgrepo.com/show/482540/shoe-8.svg"],
            ["name" => "Floristerías", "imagenes" => "https://www.svgrepo.com/show/334681/florist.svg"],
            ["name" => "Ópticas", "imagenes" => "https://www.svgrepo.com/show/197909/goggles.svg"],
            ["name" => "Accesorios", "imagenes" => "https://www.svgrepo.com/show/482631/necklace-1.svg"],
            ["name" => "Mascotas", "imagenes" => "https://www.svgrepo.com/show/354654/pet-14.svg"],
        ];
        Categoria::insert($categorias);
    }
}
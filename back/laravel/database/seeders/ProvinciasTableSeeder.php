<?php

namespace Database\Seeders;

use App\Models\provincias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProvinciasTableSeeder extends Seeder
{
    public function run(): void
    {
        $provincias = [
            [
                "code" => "04",
                "label" => "Almería"
            ],
            [
                "code" => "11",
                "label" => "Cádiz"
            ],
            [
                "code" => "14",
                "label" => "Córdoba"
            ],
            [
                "code" => "18",
                "label" => "Granada"
            ],
            [
                "code" => "21",
                "label" => "Huelva"
            ],
            [
                "code" => "23",
                "label" => "Jaén"
            ],
            [
                "code" => "29",
                "label" => "Málaga"
            ],
            [
                "code" => "41",
                "label" => "Sevilla"
            ],
            [
                "code" => "22",
                "label" => "Huesca"
            ],
            [
                "code" => "44",
                "label" => "Teruel"
            ],
            [
                "code" => "50",
                "label" => "Zaragoza"
            ],
            [
                "code" => "33",
                "label" => "Asturias"
            ],
            [
                "code" => "07",
                "label" => "Balears, Illes"
            ],
            [
                "code" => "35",
                "label" => "Palmas, Las"
            ],
            [
                "code" => "38",
                "label" => "Santa Cruz de Tenerife"
            ],
            [
                "code" => "39",
                "label" => "Cantabria"
            ],
            [
                "code" => "05",
                "label" => "Ávila"
            ],
            [
                "code" => "09",
                "label" => "Burgos"
            ],
            [
                "code" => "24",
                "label" => "León"
            ],
            [
                "code" => "34",
                "label" => "Palencia"
            ],
            [
                "code" => "37",
                "label" => "Salamanca"
            ],
            [
                "code" => "40",
                "label" => "Segovia"
            ],
            [
                "code" => "42",
                "label" => "Soria"
            ],
            [
                "code" => "47",
                "label" => "Valladolid"
            ],
            [
                "code" => "49",
                "label" => "Zamora"
            ],
            [
                "code" => "02",
                "label" => "Albacete"
            ],
            [
                "code" => "13",
                "label" => "Ciudad Real"
            ],
            [
                "code" => "16",
                "label" => "Cuenca"
            ],
            [
                "code" => "19",
                "label" => "Guadalajara"
            ],
            [
                "code" => "45",
                "label" => "Toledo"
            ],
            [
                "code" => "08",
                "label" => "Barcelona"
            ],
            [
                "code" => "17",
                "label" => "Girona"
            ],
            [
                "code" => "25",
                "label" => "Lleida"
            ],
            [
                "code" => "43",
                "label" => "Tarragona"
            ],
            [
                "code" => "03",
                "label" => "Alicante"
            ],
            [
                "code" => "12",
                "label" => "Castellón"
            ],
            [
                "code" => "46",
                "label" => "Valencia"
            ],
            [
                "code" => "06",
                "label" => "Badajoz"
            ],
            [
                "code" => "10",
                "label" => "Cáceres"
            ],
            [
                "code" => "15",
                "label" => "Coruña, A"
            ],
            [
                "code" => "27",
                "label" => "Lugo"
            ],
            [
                "code" => "32",
                "label" => "Ourense"
            ],
            [
                "code" => "36",
                "label" => "Pontevedra"
            ],
            [
                "code" => "28",
                "label" => "Madrid"
            ],
            [
                "code" => "30",
                "label" => "Murcia"
            ],
            [
                "code" => "31",
                "label" => "Navarra"
            ],
            [
                "code" => "01",
                "label" => "Araba/Álava"
            ],
            [
                "code" => "48",
                "label" => "Bizkaia"
            ],
            [
                "code" => "20",
                "label" => "Gipuzkoa"
            ],
            [
                "code" => "26",
                "label" => "Rioja, La"
            ],
            [
                "code" => "51",
                "label" => "Ceuta"
            ],
            [
                "code" => "52",
                "label" => "Melilla"
            ]
        ];

        provincias::insert($provincias);
    }
}

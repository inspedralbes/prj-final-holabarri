<?php
    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\EstatCompra;

    class EstatsTableSeeder extends Seeder {
        public function run(): void {
            EstatCompra::insert([
                ['nombre' => 'Pendent', 'color'=>'#ffb300'],
                ['nombre' => 'Llest per a recollir', 'color'=>'#ff9ef5'],
                ['nombre' => 'Enviat', 'color'=>'#006dd9'],
                ['nombre' => 'Lliurat', 'color'=>'#16d900'],
                ['nombre' => 'Cancel·lat', 'color'=>'#ff0000']
            ]);
        }
    }
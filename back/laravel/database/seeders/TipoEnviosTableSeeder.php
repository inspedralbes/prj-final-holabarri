<?php
    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class TipoEnviosTableSeeder extends Seeder {
        public function run(): void {
            DB::table('tipo_envios')->insert([
                ['nombre' => 'Enviament'],
                ['nombre' => 'Recollida'],
            ]);
        }
    }
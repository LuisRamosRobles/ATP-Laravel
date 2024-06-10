<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tenistas')->insert([
            [
                'nombre_completo' => 'Luis Ramos',
                'pais' => 'España',
                'fecha_nacimiento' => '08-07-2002',
                'altura' => 1.77,
                'peso' => 80.0,
                'profesional_desde' => '09-05-2015',
                'mano_pref' => 'DIESTRO',
                'reves' => 'UNA',
                'entrenador' => 'Rajoy',
                'price_money' => 15000.50,
                'win' => 3,
                'lost' => 3,
                'puntos' => '450',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_completo' => 'Americo Vespucio',
                'pais' => 'Italia',
                'fecha_nacimiento' => '09-03-1451',
                'altura' => 1.75,
                'peso' => 73.6,
                'profesional_desde' => '07-08-1578',
                'mano_pref' => 'ZURDO',
                'reves' => 'DOS',
                'entrenador' => 'Nastagio Vespucci',
                'price_money' => 2500000.94,
                'win' => 6,
                'lost' => 3,
                'puntos' => '370',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_completo' => 'Jeffrey Lebowski',
                'pais' => 'EEUU',
                'fecha_nacimiento' => '04-12-1949',
                'altura' => 1.83,
                'peso' => 85.7,
                'profesional_desde' => '17-05-1969',
                'mano_pref' => 'DIESTRO',
                'reves' => 'DOS',
                'entrenador' => 'Maude Lebowski',
                'price_money' => 680450.75,
                'win' => 17,
                'lost' => 9,
                'puntos' => '975',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

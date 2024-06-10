<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos')->insert([
            [
                'nombre' => 'Open Miami',
                'ubicacion' => 'Miami',
                'tipo_torneo' => 'INDIVIDUAL',
                'categoria' => 'MASTERS_1000',
                'superficie' => 'HIERBA',
                'entradas' => '2',
                'fecha_ini' => '01-05-2024',
                'fecha_fin' => '15-05-2024',
                'premio' => 1000000.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Open Australia',
                'ubicacion' => 'Australia',
                'tipo_torneo' => 'DOBLES',
                'categoria' => 'MASTERS_500',
                'superficie' => 'TIERRA_BATIDA',
                'entradas' => '20',
                'fecha_ini' => '01-06-2024',
                'fecha_fin' => '20-06-2024',
                'premio' => 500000.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Open Madrid',
                'ubicacion' => 'Madrid',
                'tipo_torneo' => 'INDIVIDUAL_DOBLES',
                'categoria' => 'MASTERS_250',
                'superficie' => 'PISTA_DURA',
                'entradas' => '32',
                'fecha_ini' => '02-09-2024',
                'fecha_fin' => '23-09-2024',
                'premio' => 250000.50,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

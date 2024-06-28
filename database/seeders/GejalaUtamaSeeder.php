<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaUtamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gejala')->insert([
            [
                'kode_gejala' => 'GU1',
                'nama_gejala' => 'afek depresif',
                'keterangan' => 'perasaan atau emosi yang terkait dengan depresi, ini mencakup perasaan sedih, murung, gelisah atau kehilangan minat dan kesenangan aktifitas',
            ], [
                'kode_gejala' => 'GU2',
                'nama_gejala' => 'kehilangan minat dan kegembiraan.',
                'keterangan' => 'kehilangan minat dan kegembiraan.',
            ], [
                'kode_gejala' => 'GU3',
                'nama_gejala' => 'berkurangnya energi, mudah lelah dan menurunnya aktifitas.',
                'keterangan' => 'berkurangnya energi, mudah lelah dan menurunnya aktifitas.',
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaLainnyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gejalalainnya')->insert([
            [
                'kode_gejala' => 'G1',
                'nama_gejala' => 'konsentrasi dan perhatian berkurang.',
                'keterangan' => 'onsentrasi dan perhatian berkurang.',
            ], [
                'kode_gejala' => 'G2',
                'nama_gejala' => 'harga diri dan kepercayaan diri berkurang',
                'keterangan' => 'harga diri dan kepercayaan diri berkurang',
            ], [
                'kode_gejala' => 'G3',
                'nama_gejala' => 'gagasan tentang rasa bersalah dan tidak berguna.',
                'keterangan' => 'gagasan tentang rasa bersalah dan tidak berguna.',
            ], [
                'kode_gejala' => 'G4',
                'nama_gejala' => 'pandangan masa depan yang suram dan pesimistis.',
                'keterangan' => 'pandangan masa depan yang suram dan pesimistis.',
            ], [
                'kode_gejala' => 'G5',
                'nama_gejala' => 'gagasan atau perbuatan yang membahayakan diri atau bunuh diri.',
                'keterangan' => 'gagasan atau perbuatan yang membahayakan diri atau bunuh diri.',
            ], [
                'kode_gejala' => 'G6',
                'nama_gejala' => 'tidur terganggu.',
                'keterangan' => 'tidur terganggu',
            ], [
                'kode_gejala' => 'G7',
                'nama_gejala' => 'nafsu makan berkurang.',
                'keterangan' => 'nafsu makan berkurang.',
            ]
        ]);
    }
}

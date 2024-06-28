<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'fullname' => 'Muhammad Akbar Firdaus',
                'alamat' => 'lhokseumawe',
                'email' => 'afir832@gmail.com',
                'usia' => 22,
                'jenis_kelamin' => 'laki-laki',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Zacky Syifa Juanda',
                'alamat' => 'lhoksukon',
                'email' => 'jack@gmail.com',
                'usia' => 22,
                'jenis_kelamin' => 'Laki-Laki',
                'password' => Hash::make('password456'),
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

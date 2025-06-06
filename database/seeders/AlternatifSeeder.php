<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alternatifs')->insert([
            [
                'kode' => 'A1',
                'nama' => 'Khairul Anhar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A2',
                'nama' => 'Vivi Elvina Simanjuntak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A3',
                'nama' => 'Rahmad Hidayat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A4',
                'nama' => 'Rudi Hermansyah Bako',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A5',
                'nama' => 'Ricky Syahputra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A6',
                'nama' => 'Rudi Sidabutar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A7',
                'nama' => 'Chandra Mualim Putra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A8',
                'nama' => 'Muhammad Soufi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A9',
                'nama' => 'Moethar Situmeang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A10',
                'nama' => 'Agustin Rahmawati',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data penilaian berdasarkan tabel yang diberikan pada dokumen
        $penilaians = [
            // Khairul Anhar (A1)
            ['alternatif_id' => 1, 'kriteria_id' => 1, 'nilai' => 4], // C1 - Kedisiplinan
            ['alternatif_id' => 1, 'kriteria_id' => 2, 'nilai' => 4], // C2 - Kerjasama Tim
            ['alternatif_id' => 1, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 1, 'kriteria_id' => 4, 'nilai' => 4], // C4 - Kehadiran
            ['alternatif_id' => 1, 'kriteria_id' => 5, 'nilai' => 4], // C5 - Skill
            ['alternatif_id' => 1, 'kriteria_id' => 6, 'nilai' => 4], // C6 - Loyalitas
            ['alternatif_id' => 1, 'kriteria_id' => 7, 'nilai' => 7], // C7 - Masa Kerja
            ['alternatif_id' => 1, 'kriteria_id' => 8, 'nilai' => 4], // C8 - Produktifitas

            // Vivi Elvina Simanjuntak (A2)
            ['alternatif_id' => 2, 'kriteria_id' => 1, 'nilai' => 3], // C1 - Kedisiplinan
            ['alternatif_id' => 2, 'kriteria_id' => 2, 'nilai' => 3], // C2 - Kerjasama Tim
            ['alternatif_id' => 2, 'kriteria_id' => 3, 'nilai' => 2], // C3 - Sikap
            ['alternatif_id' => 2, 'kriteria_id' => 4, 'nilai' => 3], // C4 - Kehadiran
            ['alternatif_id' => 2, 'kriteria_id' => 5, 'nilai' => 3], // C5 - Skill
            ['alternatif_id' => 2, 'kriteria_id' => 6, 'nilai' => 3], // C6 - Loyalitas
            ['alternatif_id' => 2, 'kriteria_id' => 7, 'nilai' => 5], // C7 - Masa Kerja
            ['alternatif_id' => 2, 'kriteria_id' => 8, 'nilai' => 3], // C8 - Produktifitas

            // Rahmad Hidayat (A3)
            ['alternatif_id' => 3, 'kriteria_id' => 1, 'nilai' => 2], // C1 - Kedisiplinan
            ['alternatif_id' => 3, 'kriteria_id' => 2, 'nilai' => 3], // C2 - Kerjasama Tim
            ['alternatif_id' => 3, 'kriteria_id' => 3, 'nilai' => 4], // C3 - Sikap
            ['alternatif_id' => 3, 'kriteria_id' => 4, 'nilai' => 3], // C4 - Kehadiran
            ['alternatif_id' => 3, 'kriteria_id' => 5, 'nilai' => 2], // C5 - Skill
            ['alternatif_id' => 3, 'kriteria_id' => 6, 'nilai' => 2], // C6 - Loyalitas
            ['alternatif_id' => 3, 'kriteria_id' => 7, 'nilai' => 4], // C7 - Masa Kerja
            ['alternatif_id' => 3, 'kriteria_id' => 8, 'nilai' => 2], // C8 - Produktifitas

            // Rudi Hermansyah Bako (A4)
            ['alternatif_id' => 4, 'kriteria_id' => 1, 'nilai' => 2], // C1 - Kedisiplinan
            ['alternatif_id' => 4, 'kriteria_id' => 2, 'nilai' => 2], // C2 - Kerjasama Tim
            ['alternatif_id' => 4, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 4, 'kriteria_id' => 4, 'nilai' => 4], // C4 - Kehadiran
            ['alternatif_id' => 4, 'kriteria_id' => 5, 'nilai' => 4], // C5 - Skill
            ['alternatif_id' => 4, 'kriteria_id' => 6, 'nilai' => 3], // C6 - Loyalitas
            ['alternatif_id' => 4, 'kriteria_id' => 7, 'nilai' => 3], // C7 - Masa Kerja
            ['alternatif_id' => 4, 'kriteria_id' => 8, 'nilai' => 3], // C8 - Produktifitas

            // Ricky Syahputra (A5)
            ['alternatif_id' => 5, 'kriteria_id' => 1, 'nilai' => 3], // C1 - Kedisiplinan
            ['alternatif_id' => 5, 'kriteria_id' => 2, 'nilai' => 3], // C2 - Kerjasama Tim
            ['alternatif_id' => 5, 'kriteria_id' => 3, 'nilai' => 2], // C3 - Sikap
            ['alternatif_id' => 5, 'kriteria_id' => 4, 'nilai' => 3], // C4 - Kehadiran
            ['alternatif_id' => 5, 'kriteria_id' => 5, 'nilai' => 3], // C5 - Skill
            ['alternatif_id' => 5, 'kriteria_id' => 6, 'nilai' => 2], // C6 - Loyalitas
            ['alternatif_id' => 5, 'kriteria_id' => 7, 'nilai' => 2], // C7 - Masa Kerja
            ['alternatif_id' => 5, 'kriteria_id' => 8, 'nilai' => 2], // C8 - Produktifitas

            // Rudi Sidabutar (A6)
            ['alternatif_id' => 6, 'kriteria_id' => 1, 'nilai' => 3], // C1 - Kedisiplinan
            ['alternatif_id' => 6, 'kriteria_id' => 2, 'nilai' => 4], // C2 - Kerjasama Tim
            ['alternatif_id' => 6, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 6, 'kriteria_id' => 4, 'nilai' => 2], // C4 - Kehadiran
            ['alternatif_id' => 6, 'kriteria_id' => 5, 'nilai' => 3], // C5 - Skill
            ['alternatif_id' => 6, 'kriteria_id' => 6, 'nilai' => 2], // C6 - Loyalitas
            ['alternatif_id' => 6, 'kriteria_id' => 7, 'nilai' => 4], // C7 - Masa Kerja
            ['alternatif_id' => 6, 'kriteria_id' => 8, 'nilai' => 2], // C8 - Produktifitas

            // Chandra Mualim Putra (A7)
            ['alternatif_id' => 7, 'kriteria_id' => 1, 'nilai' => 2], // C1 - Kedisiplinan
            ['alternatif_id' => 7, 'kriteria_id' => 2, 'nilai' => 2], // C2 - Kerjasama Tim
            ['alternatif_id' => 7, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 7, 'kriteria_id' => 4, 'nilai' => 3], // C4 - Kehadiran
            ['alternatif_id' => 7, 'kriteria_id' => 5, 'nilai' => 4], // C5 - Skill
            ['alternatif_id' => 7, 'kriteria_id' => 6, 'nilai' => 1], // C6 - Loyalitas
            ['alternatif_id' => 7, 'kriteria_id' => 7, 'nilai' => 2], // C7 - Masa Kerja
            ['alternatif_id' => 7, 'kriteria_id' => 8, 'nilai' => 1], // C8 - Produktifitas

            // Muhammad Soufi (A8)
            ['alternatif_id' => 8, 'kriteria_id' => 1, 'nilai' => 3], // C1 - Kedisiplinan
            ['alternatif_id' => 8, 'kriteria_id' => 2, 'nilai' => 4], // C2 - Kerjasama Tim
            ['alternatif_id' => 8, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 8, 'kriteria_id' => 4, 'nilai' => 2], // C4 - Kehadiran
            ['alternatif_id' => 8, 'kriteria_id' => 5, 'nilai' => 3], // C5 - Skill
            ['alternatif_id' => 8, 'kriteria_id' => 6, 'nilai' => 3], // C6 - Loyalitas
            ['alternatif_id' => 8, 'kriteria_id' => 7, 'nilai' => 4], // C7 - Masa Kerja
            ['alternatif_id' => 8, 'kriteria_id' => 8, 'nilai' => 3], // C8 - Produktifitas

            // Moethar Situmeang (A9)
            ['alternatif_id' => 9, 'kriteria_id' => 1, 'nilai' => 4], // C1 - Kedisiplinan
            ['alternatif_id' => 9, 'kriteria_id' => 2, 'nilai' => 4], // C2 - Kerjasama Tim
            ['alternatif_id' => 9, 'kriteria_id' => 3, 'nilai' => 4], // C3 - Sikap
            ['alternatif_id' => 9, 'kriteria_id' => 4, 'nilai' => 3], // C4 - Kehadiran
            ['alternatif_id' => 9, 'kriteria_id' => 5, 'nilai' => 3], // C5 - Skill
            ['alternatif_id' => 9, 'kriteria_id' => 6, 'nilai' => 2], // C6 - Loyalitas
            ['alternatif_id' => 9, 'kriteria_id' => 7, 'nilai' => 6], // C7 - Masa Kerja
            ['alternatif_id' => 9, 'kriteria_id' => 8, 'nilai' => 2], // C8 - Produktifitas

            // Agustin Rahmawati (A10)
            ['alternatif_id' => 10, 'kriteria_id' => 1, 'nilai' => 4], // C1 - Kedisiplinan
            ['alternatif_id' => 10, 'kriteria_id' => 2, 'nilai' => 2], // C2 - Kerjasama Tim
            ['alternatif_id' => 10, 'kriteria_id' => 3, 'nilai' => 3], // C3 - Sikap
            ['alternatif_id' => 10, 'kriteria_id' => 4, 'nilai' => 4], // C4 - Kehadiran
            ['alternatif_id' => 10, 'kriteria_id' => 5, 'nilai' => 2], // C5 - Skill
            ['alternatif_id' => 10, 'kriteria_id' => 6, 'nilai' => 3], // C6 - Loyalitas
            ['alternatif_id' => 10, 'kriteria_id' => 7, 'nilai' => 5], // C7 - Masa Kerja
            ['alternatif_id' => 10, 'kriteria_id' => 8, 'nilai' => 3], // C8 - Produktifitas
        ];

        foreach ($penilaians as $penilaian) {
            // Cek apakah kombinasi alternatif_id dan kriteria_id sudah ada
            $exists = DB::table('penilaians')
                ->where('alternatif_id', $penilaian['alternatif_id'])
                ->where('kriteria_id', $penilaian['kriteria_id'])
                ->exists();

            if (!$exists) {
                DB::table('penilaians')->insert([
                    'alternatif_id' => $penilaian['alternatif_id'],
                    'kriteria_id' => $penilaian['kriteria_id'],
                    'nilai' => $penilaian['nilai'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
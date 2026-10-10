<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::insert([
            [
                'nisn' => '0095564385',
                'nama_siswa' => 'Silvi Nispi',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0095564384',
                'nama_siswa' => 'Silvi Alviana',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0095564383',
                'nama_siswa' => 'Isna Qudsiatul Aulia',
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0095564382',
                'nama_siswa' => 'Arkhan',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '0095564381',
                'nama_siswa' => 'Miftah Faridl',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_masuk' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

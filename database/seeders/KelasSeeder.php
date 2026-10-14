<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        Kelas::insert([
            ['nama_kelas' => 'X A'],
            ['nama_kelas' => 'X B'],
            ['nama_kelas' => 'X C'],
            ['nama_kelas' => 'XI A'],
            ['nama_kelas' => 'XI B'],
            ['nama_kelas' => 'XI C'],
            ['nama_kelas' => 'XII A'],
            ['nama_kelas' => 'XII B'],
            ['nama_kelas' => 'XII C'],
        ]);
    }
}
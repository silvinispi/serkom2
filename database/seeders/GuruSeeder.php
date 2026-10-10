<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::insert([
            [
                'nama_guru' => 'Abdullah Faqih S.Pd',
                'slug' => Str::slug('Abdullah Faqih S.Pd'),
                'nip' => '198501012010011001',
                'mapel' => 'Matematika',
                'foto' => 'fqh.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Nurhakiki S.pd',
                'slug' => Str::slug('Nurhakiki S.pd'),
                'nip' => '198501012010011002',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'ki.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Ai Siti Mulyati S.M',
                'slug' => Str::slug('Ai Siti Mulyati S.M'),
                'nip' => '198501012010011003',
                'mapel' => 'Bahasa Arab',
                'foto' => 'yt.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Noviana Arif Ramadhan S.Sos',
                'slug' => Str::slug('Noviana Arif Ramadhan S.Sos'),
                'nip' => '198501012010011004',
                'mapel' => 'Bahasa Inggris',
                'foto' => 'cu.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Febian Anger Putra S.Ikom',
                'slug' => Str::slug('Febian Anger Putra S.Ikom'),
                'nip' => '198501012010011005',
                'mapel' => 'IPS',
                'foto' => 'cil.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

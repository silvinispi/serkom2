<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekstrakurikuler::insert([
            [
                'nama_ekskul' => 'PMR',
                'id_guru' => 1,
                'pembina' => 'Abdullah Faqih S.Pd',
                'jadwal_latihan' => 'Kamis',
                'deskripsi' => 'Ektrakurikuler kesehatan',
                'gambar' => 'pmr.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ekskul' => 'Pramuka',
                'id_guru' => 2,
                'pembina' => 'Nurhakiki S.pd',
                'jadwal_latihan' => 'Sabtu',
                'deskripsi' => 'Ekstrakurikuler wajib yang melatih kemandirian, kedisiplinan, dan jiwa kepemimpinan siswa.',
                'gambar' => 'pramuka.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ekskul' => 'TIKom',
                'id_guru' => 5,
                'pembina' => 'Febian Anger Putra S.Ikom',
                'jadwal_latihan' => 'Jumat',
                'deskripsi' => 'Ekstrakurikuler yang melatih baris-berbaris dan mempersiapkan pasukan pengibar bendera.',
                'gambar' =>'tikom.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ekskul' => 'Arabic Club',
                'id_guru' => 3,
                'pembina' => 'Ai Siti Mulyati S.M',
                'jadwal_latihan' => 'Selasa',
                'deskripsi' => 'Ekstrakurikuler olahraga futsal untuk mengembangkan bakat dan minat siswa di bidang sepak bola.',
                'gambar' => 'arabic.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ekskul' => 'English Club',
                'id_guru' => 4,
                'pembina' => 'Noviana Arif Ramadhan S.Sos',
                'jadwal_latihan' => 'Rabu',
                'deskripsi' => 'Ekstrakurikuler seni musik islami yang melatih siswa dalam bermain alat musik tradisional islam.',
                'gambar' => 'nifela.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

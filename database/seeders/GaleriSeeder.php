<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::insert([
            [
                'judul'      => 'Pelantikan',
                'slug'       => Str::slug('Pelantikan'),
                'keterangan' => 'Kenaikan Pangkat',
                'file'       => 'carousel1.jpg',
                'kategori'   => 'Foto',
                'tanggal'    => '2026-07-29',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'      => 'Upacara Bendera',
                'slug'       => Str::slug('Upacara Bendera'),
                'keterangan' => 'Upacara bendera hari Senin di lapangan sekolah',
                'file'       => 'galeri2.jpg',
                'kategori'   => 'Foto',
                'tanggal'    => '2026-08-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'      => 'Kegiatan Belajar Mengajar',
                'slug'       => Str::slug('Kegiatan Belajar Mengajar'),
                'keterangan' => 'Suasana KBM di dalam kelas',
                'file'       => 'galeri1.jpg',
                'kategori'   => 'Foto',
                'tanggal'    => '2026-08-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'      => 'Peringatan Maulid Nabi',
                'slug'       => Str::slug('Peringatan Maulid Nabi'),
                'keterangan' => 'Dokumentasi acara peringatan Maulid Nabi Muhammad SAW',
                'file'       => 'berita3.mp4',
                'kategori'   => 'Video',
                'tanggal'    => '2026-09-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'      => 'Study Tour',
                'slug'       => Str::slug('Study Tour'),
                'keterangan' => 'Kegiatan study tour siswa ke museum',
                'file'       => 'galeri3.jpg',
                'kategori'   => 'Foto',
                'tanggal'    => '2026-10-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

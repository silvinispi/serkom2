<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::insert([
            [
                'judul' => 'Pengumuman Kelulusan',
                'slug' => Str::slug('Pengumuman Kelulusan'),
                'isi' => 'Surat Keterangan Lulus akan dibagikan pada tanggal yang telah di tentukan',
                'tanggal' => '2027-05-04',
                'gambar' => null,
                'id_user' => 1,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Penerimaan Peserta Didik Baru 2025/2026',
                'slug' => Str::slug('Penerimaan Peserta Didik Baru 2025/2026'),
                'isi' => 'Pendaftaran PPDB tahun ajaran 2026/2027 resmi dibuka. Calon peserta didik dapat mendaftar langsung ke sekolah atau daftar secara online.',
                'tanggal' => '2026-06-15',
                'gambar' => 'berita1.jpg',
                'id_user' => 1,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Juara KSM Kab. Tasikmalaya ',
                'slug' => Str::slug('Juara KSM Kab. Tasikmalaya'),
                'isi' => 'Alhamdulillah, siswa MTS PSA Nurul Ihsan berhasil meraih juara KSM tingkat kabupaten.',
                'tanggal' => '2026-08-20',
                'gambar' => 'berita2.jpg',
                'id_user' => 1,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Peringatan Maulid Nabi',
                'slug' => Str::slug('Kegiatan Peringatan Maulid Nabi'),
                'isi' => 'Sekolah mengadakan peringatan Maulid Nabi Muhammad SAW dengan berbagai rangkaian acara seperti lomba azan, tahfidz, dan tausiyah.',
                'tanggal' => '2026-09-27',
                'gambar' => 'galeri4.jpg',
                'id_user' => 2,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Jadwal Ujian Akhir Semester Ganjil',
                'slug' => Str::slug('Jadwal Ujian Akhir Semester Ganjil'),
                'isi' => 'Ujian Akhir Semester Ganjil akan dilaksanakan mulai tanggal 1 Desember 2026. Siswa diharapkan mempersiapkan diri dengan baik.',
                'tanggal' => '2026-11-25',
                'gambar' => null,
                'id_user' => 2,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Peringatan Maulid Nabi Muhammad SAW 1447 H Berbarengan dengan Haflah Pesantren Nurul Ihsan',
                'slug' => Str::slug('Peringatan Maulid Nabi Muhammad SAW 1447 H Berbarengan dengan Haflah Pesantren Nurul Ihsan'),
                'isi' => 'MTS PSA Nurul Ihsan bersama Pesantren Satu Atap Nurul Ihsan akan menyelenggarakan peringatan Maulid Nabi Muhammad SAW 1447 H yang digabungkan dengan Haflah Akhirussanah Pesantren Nurul Ihsan. Acara akan dilaksanakan pada Sabtu, 15 November 2026, pukul 07.30 WIB hingga selesai di Lapangan Utama MTS PSA Nurul Ihsan. Rangkaian acara meliputi pembacaan sholawat bersama, tilawah Al-Qur\'an, tausiyah agama, penampilan santri, doa bersama, dan ramah tamah. Kami mengundang seluruh wali murid, orang tua santri, alumni, tokoh masyarakat, serta warga sekitar untuk hadir dan meramaikan acara ini. Kehadiran dan doa Bapak/Ibu/Saudara sangat berarti bagi kami.',
                'tanggal' => '2026-11-10',
                'gambar' => 'jadwal.jpeg',
                'id_user' => 3,
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

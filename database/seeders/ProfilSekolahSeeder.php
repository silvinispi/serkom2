<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilSekolah::create([
            'nama_sekolah' => 'MTS PSA Nurul Ihsan',
            'kepala_sekolah' => 'Yeti Rohayati S.Pdi',
            'nip' => '198501012010011001',
            'foto' => 'buyeti.jpeg',
            'logo' => 'ni.png',
            'npsn' => '20278496',
            'alamat' => 'Kp. Cicangkudu, Desa Margajaya, Kec.Mangunreja, Kab. Tasikmalaya, Jawa Barat, Indonesia',
            'kontak' => '6282317293500',
            'instagram' => 'https://instagram.com/mtspsanurulihsan',
            'facebook'  => 'https://facebook.com/MTs.PSA.NI',
            'youtube'   => 'https://youtube.com/@pesantrennurulihsan',
            'visi_misi' => 'Visi: Wahana Pembinaan Insan Ihsan Mapan Masa depan.
                            Misi:
                            - Melakukan analisa / bedah kurikulum secara terus menerus
                            - Menciptakan proses pembelajaran yang menyenangkan
                            - Membangun keaktifan peserta didik
                            - Membangun integrasi materi umum dan keagamaan
                            - Menciptakan lulusan yang memiliki dasar agama yang kuat, dasar calon pemimpin yang luas, kompeten, kreatif dan produktif
                            - Memupuk terciptanya dasar generasi islami yang luas pengetahuannya
                            - Membangun motivasi pendidik sebagai suri tauladan
                            - Melaksanakan pelatihan-pelatihan internal sebagai daya dukung program
                            - Menciptakan lingkungan yang rindang dan asri
                            - Membangun sarana yang proporsional',

            'tahun_berdiri' => '2007',
            'deskripsi' => 'MTs PSA Nurul Ihsan merupakan madrasah yang berada dalam satu atap dengan pesantren, sehingga peserta didik dapat memperoleh pendidikan formal sekaligus pembinaan keagamaan. Dengan perpaduan ilmu pengetahuan, pendidikan karakter, dan nilai-nilai pesantren, MTs PSA Nurul Ihsan berkomitmen membentuk generasi yang berilmu, berakhlak, mandiri, dan berprestasi.
',
            'banner' => 'welcome.jpg',
            'text' => 'Website ini kami hadirkan sebagai jendela informasi dan sarana komunikasi antara madrasah, orang tua, peserta didik, serta masyarakat luas. Melalui media ini, kami berbagi kabar terbaru seputar kegiatan belajar, prestasi siswa, dan berbagai program unggulan yang kami jalankan.'
        ]);
    }
}

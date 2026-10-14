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
                'nama_guru' => 'Denden Abdullah Nawawi S.Pd',
                'slug' => Str::slug('Denden Abdullah Nawawi S.Pd'),
                'nip' => '198501012010011001',
                'mapel' => 'Jurumiyah',
                'foto' => 'padenden.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Nia Purnamasari S.Pd',
                'slug' => Str::slug('Nia Purnamasari S.Pd'),
                'nip' => '198501012010011002',
                'mapel' => 'Bahasa Inggris',
                'foto' => 'bunia.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Ishak Parid S.T',
                'slug' => Str::slug('Ishak Parid S.T'),
                'nip' => '198501012010011003',
                'mapel' => 'Bahasa Sunda',
                'foto' => 'paisak.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'M. Sambas S.Pd',
                'slug' => Str::slug('M. Sambas S.Pd'),
                'nip' => '198501012010011004',
                'mapel' => 'Fiqh',
                'foto' => 'pasambas.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Fathullah S.Pd',
                'slug' => Str::slug('Fathullah S.Pd'),
                'nip' => '198501012010011005',
                'mapel' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan',
                'foto' => 'paipat.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Siti Komalasari S.Pd',
                'slug' => Str::slug('Siti Komalasari S.Pd'),
                'nip' => '198501012010011006',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'bumala.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Amanda S.Pd',
                'slug' => Str::slug('Amanda S.Pd'),
                'nip' => '198501012010011007',
                'mapel' => 'Seni Budaya',
                'foto' => 'buamanda.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Endah Siti Saadah S.Pd',
                'slug' => Str::slug('Endah Siti Saadah S.Pd'),
                'nip' => '198501012010011008',
                'mapel' => 'Bahasa Inggris',
                'foto' => 'buendah.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Sansan Rahmat Sadeli M.Pd',
                'slug' => Str::slug('Sansan Rahmat Sadeli M.Pd'),
                'nip' => '198501012010011009',
                'mapel' => 'Aqidah Akhlak',
                'foto' => 'pasansan.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Ai Siti Maryanah S.Pd',
                'slug' => Str::slug('Ai Siti Maryanah S.Pd'),
                'nip' => '198501012010011010',
                'mapel' => 'Bahasa Arab',
                'foto' => 'buai.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Astri Rahayu Achdiani S.Pd',
                'slug' => Str::slug('Astri Rahayu Achdiani S.Pd'),
                'nip' => '198501012010011011',
                'mapel' => 'Matematika',
                'foto' => 'buayu.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Dedeh S.Pd',
                'slug' => Str::slug('Dedeh S.Pd'),
                'nip' => '198501012010011012',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'budedeh.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Rita Siti Jueriyah S.Sos',
                'slug' => Str::slug('Rita Siti Jueriyah S.Sos'),
                'nip' => '198501012010011013',
                'mapel' => 'Ilmu Pengetahuan Alam',
                'foto' => 'burita.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Ipin Zaenal Aripin S.Pd.I',
                'slug' => Str::slug('Ipin Zaenal Aripin S.Pd.I'),
                'nip' => '198501012010011014',
                'mapel' => 'Sejarah Kebudayaan Islam',
                'foto' => 'paipin.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Mulyana Mustafa S.Pd',
                'slug' => Str::slug('Mulyana Mustafa S.Pd'),
                'nip' => '198501012010011015',
                'mapel' => 'Matematika',
                'foto' => 'pamul.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Cecep Rahmat Hidayat S.E M.Pd',
                'slug' => Str::slug('Cecep Rahmat Hidayat S.E M.Pd'),
                'nip' => '198501012010011016',
                'mapel' => 'Pendidikan Kewarganegaraan',
                'foto' => 'pacecep.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'M. Mansur S.Pd',
                'slug' => Str::slug('M. Mansur S.Pd'),
                'nip' => '198501012010011017',
                'mapel' => 'Ilmu Pengetahuan Sosial',
                'foto' => 'paacuy.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Ahmad Hanapi S.Pd',
                'slug' => Str::slug('Ahmad Hanapi S.Pd'),
                'nip' => '198501012010011018',
                'mapel' => 'Alquran Hadits',
                'foto' => 'paepi.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Vuji Diniati Siswaya',
                'slug' => Str::slug('Vuji Diniati Siswaya'),
                'nip' => '198501012010011019',
                'mapel' => 'Ilmu Pengetahuan Sosial',
                'foto' => 'buvuji.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_guru' => 'Iib Sobahudin S.Pd',
                'slug' => Str::slug('Iib Sobahudin S.Pd'),
                'nip' => '198501012010011020',
                'mapel' => 'Shorof',
                'foto' => 'paiib.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

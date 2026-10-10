<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProfilSekolahSeeder::class,
        ]);

        $this->call([
            GuruSeeder::class,
        ]);

        $this->call([
            SiswaSeeder::class,
        ]);

        $this->call([
            EkstrakurikulerSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            GaleriSeeder::class,
        ]);

        $this->call([
            BeritaSeeder::class,
        ]);

    }
}

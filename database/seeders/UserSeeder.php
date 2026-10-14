<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Silvi Nispi',
                'foto' => 'nsp.jpeg',
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Silvi Alviana',
                'foto' => 'alvi.jpg',
                'username' => 'operator',
                'password' => bcrypt('operator123'),
                'role' => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Isna Qudsiatul Aulia',
                'foto' => 'isna.jpeg',
                'username' => 'operator2',
                'password' => bcrypt('operator321'),
                'role' => 'operator',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Administrator
        User::updateOrCreate(
            ['email' => 'admin@myresilience.com'],
            [
                'name' => 'Administrator MY RESILIENCE',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // 2. Akun Contoh Konseli (Siswa)
        User::updateOrCreate(
            ['email' => 'konseli@myresilience.com'],
            [
                'name' => 'Andi Wijaya',
                'password' => Hash::make('password'),
                'role' => 'konseli',
            ]
        );
    }
}

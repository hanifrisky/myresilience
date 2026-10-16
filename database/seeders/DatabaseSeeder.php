<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\OptionGroup;
use App\Models\OptionItem;
use App\Models\Question;
use App\Models\Interpretation;
use App\Models\Tribe;
use App\Models\Material;
use App\Models\MaterialQuestion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin
        User::firstOrCreate(
            ['email' => 'admin@myresilience.com'],
            [
                'name' => 'Administrator MY RESILIENCE',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // 2. Create Counselors via CounselorSeeder
        $this->call(CounselorSeeder::class);

        // 3. Create Konseli
        User::firstOrCreate(
            ['email' => 'konseli@myresilience.com'],
            [
                'name' => 'Andi Wijaya',
                'password' => bcrypt('password'),
                'role' => 'konseli',
            ]
        );

        // 4. Create Interpretations (Instrumen Resiliensi)
        $interpretations = [
            [
                'min_score' => 30,
                'max_score' => 69,
                'description' => 'Resiliensi Rendah (Kerentanan Psikologis Tinggi). Kamu mungkin sedang menghadapi tekanan berat dan merasa kesulitan menemukan jalan keluar. Jangan khawatir, kamu tidak sendirian! Sangat disarankan untuk mengikuti sesi Self-Help berfokus solusi secara bertahap dan mengkomunikasikan hasilnya dengan Konselor serta menghubungi konselor sekolah untuk sesi lanjutan.'
            ],
            [
                'min_score' => 70,
                'max_score' => 109,
                'description' => 'Resiliensi Sedang. Kamu telah memiliki modal ketangguhan diri yang cukup baik untuk bertahan dalam situasi sulit, namun masih dapat terus dioptimalkan. Mari eksplorasi kekuatan dirimu dan rancang langkah-langkah solusi konkret melalui modul Self-Help serta diskusikan dengan Konselormu.'
            ],
            [
                'min_score' => 110,
                'max_score' => 150,
                'description' => 'Resiliensi Tinggi. Selamat! Kamu memiliki tingkat ketangguhan mental dan emosional yang sangat baik, mampu berfokus pada solusi, serta adaptif dalam menghadapi tantangan. Terus pertahankan kebiasaan positifmu dan komunikasikan perkembanganmu bersama Konselor.'
            ]
        ];

        foreach ($interpretations as $interp) {
            Interpretation::updateOrCreate(
                [
                    'min_score' => $interp['min_score'],
                    'max_score' => $interp['max_score']
                ],
                [
                    'description' => $interp['description']
                ]
            );
        }

        // 5. Create SFBC Resilience Self-Help Module
        $this->call(ResilienceSelfHelpSeeder::class);

        // 6. Create Resilience Scale Questions (Positif/Negatif)
        $this->call(WellbeingQuestionSeeder::class);
    }
}







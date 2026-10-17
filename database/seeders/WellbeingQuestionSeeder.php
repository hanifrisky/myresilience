<?php

namespace Database\Seeders;

use App\Models\Interpretation;
use App\Models\OptionGroup;
use App\Models\OptionItem;
use App\Models\Question;
use Illuminate\Database\Seeder;

class WellbeingQuestionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kelompok Opsi Positif (+) dan Butir Pilihan Jawabannya
        $groupPositif = OptionGroup::firstOrCreate(['name' => 'Sangat Setuju (Positif)']);

        $optionsPositif = [
            ['label' => 'Sangat Setuju', 'score' => 5, 'order' => 0],
            ['label' => 'Setuju', 'score' => 4, 'order' => 1],
            ['label' => 'Netral', 'score' => 3, 'order' => 2],
            ['label' => 'Tidak Setuju', 'score' => 2, 'order' => 3],
            ['label' => 'Sangat Tidak Setuju', 'score' => 1, 'order' => 4],
        ];

        foreach ($optionsPositif as $opt) {
            OptionItem::updateOrCreate(
                [
                    'option_group_id' => $groupPositif->id,
                    'label' => $opt['label'],
                ],
                [
                    'score' => $opt['score'],
                    'order' => $opt['order'],
                ]
            );
        }

        // 2. Buat Kelompok Opsi Negatif (-) dan Butir Pilihan Jawabannya
        $groupNegatif = OptionGroup::firstOrCreate(['name' => 'Sangat Setuju (Negatif)']);

        $optionsNegatif = [
            ['label' => 'Sangat Setuju', 'score' => 1, 'order' => 0],
            ['label' => 'Setuju', 'score' => 2, 'order' => 1],
            ['label' => 'Netral', 'score' => 3, 'order' => 2],
            ['label' => 'Tidak Setuju', 'score' => 4, 'order' => 3],
            ['label' => 'Sangat Tidak Setuju', 'score' => 5, 'order' => 4],
        ];

        foreach ($optionsNegatif as $opt) {
            OptionItem::updateOrCreate(
                [
                    'option_group_id' => $groupNegatif->id,
                    'label' => $opt['label'],
                ],
                [
                    'score' => $opt['score'],
                    'order' => $opt['order'],
                ]
            );
        }

        // 3. Bersihkan soal lama dan isi 30 Pernyataan Instrumen Resiliensi Abad 21
        Question::query()->delete();

        $questionsData = [
            // Dimensi 1: Self Regulation (1-6)
            ['type' => '+', 'dimension' => 'Self Regulation', 'text' => 'Saya mampu tetap tenang ketika berhadapan dengan situasi yang sulit'],
            ['type' => '+', 'dimension' => 'Self Regulation', 'text' => 'Saya mampu untuk mengendalikan diri sebelum mengambil keputusan ketika menghadapi masalah'],
            ['type' => '+', 'dimension' => 'Self Regulation', 'text' => 'Saya yakin dapat menghadapi kesulitan'],
            ['type' => '-', 'dimension' => 'Self Regulation', 'text' => 'Saya mudah kehilangan kendali ketika tertekan'],
            ['type' => '-', 'dimension' => 'Self Regulation', 'text' => 'Saya mudah putus asa ketika menghadapi masalah'],
            ['type' => '-', 'dimension' => 'Self Regulation', 'text' => 'Saya bertindak tanpa memikirkan akibatnya'],

            // Dimensi 2: Adaptive Capacity (7-12)
            ['type' => '+', 'dimension' => 'Adaptive Capacity', 'text' => 'Saya mampu untuk menyesuaikan diri dengan perubahan yang terjadi'],
            ['type' => '+', 'dimension' => 'Adaptive Capacity', 'text' => 'Saya belajar atas pengalaman yang sudah terjadi'],
            ['type' => '+', 'dimension' => 'Adaptive Capacity', 'text' => 'Saya tetap berusaha meskipun gagal'],
            ['type' => '-', 'dimension' => 'Adaptive Capacity', 'text' => 'Saya kesulitan menerima perubahan'],
            ['type' => '-', 'dimension' => 'Adaptive Capacity', 'text' => 'Saya mudah menyerah ketika ada hambatan'],
            ['type' => '-', 'dimension' => 'Adaptive Capacity', 'text' => 'Kegagalan membuat saya kehilangan semangat untuk mencoba kembali'],

            // Dimensi 3: Problem Solving Competence (13-18)
            ['type' => '+', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya berusaha memahami penyebab masalah sebelum melakukan tindakan'],
            ['type' => '+', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya mempertimbangan beberapa alternatif sebelum bertindak'],
            ['type' => '+', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya mengevaluasi kembali solusi yang saya lakukan'],
            ['type' => '-', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya mengambil keputusan tanpa memikirkan dampaknya'],
            ['type' => '-', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya kesulitas menemukan solusi Ketika mengalami masalah baru'],
            ['type' => '-', 'dimension' => 'Problem Solving Competence', 'text' => 'Saya cenderung menghindari masalah daripada menyelesaikannya'],

            // Dimensi 4: Social Connectedness (19-24)
            ['type' => '+', 'dimension' => 'Social Connectedness', 'text' => 'Saya memiliki orang yang saya andalkan ketika mengalami masalah'],
            ['type' => '+', 'dimension' => 'Social Connectedness', 'text' => 'Saya mampu kerjasama dengan orang lain'],
            ['type' => '+', 'dimension' => 'Social Connectedness', 'text' => 'Saya meminta bantuan orang lain ketika membutuhkan'],
            ['type' => '-', 'dimension' => 'Social Connectedness', 'text' => 'Saya harus menghadapi semua masalah sendiri'],
            ['type' => '-', 'dimension' => 'Social Connectedness', 'text' => 'Saya menghindari orang lain ketika mengalami kesulitan'],
            ['type' => '-', 'dimension' => 'Social Connectedness', 'text' => 'Saya merasa meminta bantuan orang lain merupakan tanda kelemahan'],

            // Dimensi 5: Growth Orientation (25-30)
            ['type' => '+', 'dimension' => 'Growth Orientation', 'text' => 'Saya memiliki tujuan hidup untuk berkembang'],
            ['type' => '+', 'dimension' => 'Growth Orientation', 'text' => 'Saya memandang tantangan sebagai proses belajar'],
            ['type' => '+', 'dimension' => 'Growth Orientation', 'text' => 'Saya menggunakan teknologi digital untuk mengembangkan diri'],
            ['type' => '-', 'dimension' => 'Growth Orientation', 'text' => 'Saya merasa hidup saya tidak memiliki arah yang jelas'],
            ['type' => '-', 'dimension' => 'Growth Orientation', 'text' => 'Saya enggan untuk mempelajari hal-hal baru'],
            ['type' => '-', 'dimension' => 'Growth Orientation', 'text' => 'Saya menggunakan media digital dengan cara yang menganggu perkembangan diri saya'],
        ];

        foreach ($questionsData as $index => $q) {
            $groupId = ($q['type'] === '+') ? $groupPositif->id : $groupNegatif->id;

            Question::create([
                'text' => $q['text'],
                'option_group_id' => $groupId,
                'order' => $index + 1,
            ]);
        }

        // 4. Bersihkan interpretasi lama dan isi 5 Kategori Penilaian Instrumen Resiliensi Abad 21
        Interpretation::query()->delete();

        $interpretations = [
            [
                'min_score' => 30,
                'max_score' => 54,
                'description' => 'Tingkat Resiliensi: Sangat Rendah (20% – 36%). Sangat rentan dan tidak stabil; cepat hilang kendali dan putus asa, kaku terhadap perubahan, impulsif atau pasif menghadapi masalah, menarik diri dari lingkungan, serta enggan berkembang.',
            ],
            [
                'min_score' => 55,
                'max_score' => 78,
                'description' => 'Tingkat Resiliensi: Rendah (> 20% – 40%). Rentan terhadap stres, sulit menerima perubahan, cenderung menghindari masalah, enggan meminta bantuan, dan kurang memiliki kejelasan arah tujuan hidup.',
            ],
            [
                'min_score' => 79,
                'max_score' => 102,
                'description' => 'Tingkat Resiliensi: Sedang (> 40% – 60%). Cukup mampu bertahan dalam situasi normal, namun cenderung ragu, kurang tenang, atau butuh dorongan eksternal ketika menghadapi tekanan/masalah berat.',
            ],
            [
                'min_score' => 103,
                'max_score' => 126,
                'description' => 'Tingkat Resiliensi: Tinggi (> 60% – 80%). Mampu mengendalikan diri, dapat beradaptasi dengan baik, mampu menemukan alternatif solusi, mau meminta bantuan saat butuh, dan aktif mengembangkan diri.',
            ],
            [
                'min_score' => 127,
                'max_score' => 150,
                'description' => 'Tingkat Resiliensi: Sangat Tinggi (> 80% – 100%). Sangat mahir mengendalikan emosi, sangat cepat beradaptasi, proaktif dan rasional dalam memecahkan masalah, memiliki support system yang kuat, serta konsisten berorientasi pada pertumbuhan diri melalui berbagai media.',
            ],
        ];

        foreach ($interpretations as $interp) {
            Interpretation::create($interp);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tribe;
use App\Models\Material;
use App\Models\MaterialQuestion;
use Illuminate\Database\Seeder;

class ResilienceSelfHelpSeeder extends Seeder
{
    public function run(): void
    {
        $module = Tribe::firstOrCreate(['name' => 'Modul Self-Help Resiliensi (SFBC)']);

        $materials = [
            [
                'title' => 'Sesi 1: Menemukan Harapan & Masa Depan Terbaik (Miracle & Goal Setting)',
                'values' => 'Optimisme, Orientasi Masa Depan, Kebermaknaan Diri',
                'description' => 'Dalam pendekatan Solution-Focused Brief Counseling (SFBC), langkah pertama untuk bangkit dari kerentanan psikologis adalah mengalihkan fokus dari masalah masa lalu menuju gambaran masa depan yang kamu harapkan. Setiap tantangan menyimpan peluang untuk bertumbuh ketika kamu memiliki arah dan tujuan yang jelas.',
                'order' => 1,
                'questions' => [
                    'W' => [
                        'Bayangkan jika malam ini saat kamu tidur terjadi sebuah keajaiban dan masalah yang membebani pikiranmu tiba-tiba teratasi. Ketika kamu bangun besok pagi, hal berbeda apa yang pertama kali kamu sadari pada dirimu?',
                        'Apa harapan atau tujuan positif paling penting yang ingin kamu wujudkan bagi dirimu dalam waktu dekat ini?',
                    ],
                    'D' => [
                        'Ceritakan momen di masa lalu ketika kamu pernah menghadapi situasi sulit namun berhasil melewatinya. Bagaimana kamu berhasil bertahan saat itu?',
                        'Bagian kecil apa dari gambaran "keajaiban" atau harapanmu tadi yang sebenarnya sudah mulai terjadi atau pernah kamu lakukan baru-baru ini?',
                    ],
                    'E' => [
                        'Pada skala 1 sampai 10 (1 = titik terberat, 10 = masa depan terbaik yang kamu harapkan sudah tercapai), di angka berapa posisimu saat ini?',
                        'Apa yang membuatmu sudah berhasil berada di angka tersebut dan tidak berada di angka yang lebih rendah?',
                    ],
                    'P' => [
                        'Langkah kecil dan sederhana apa yang bisa kamu lakukan dalam 24 jam ke depan agar posisimu naik 1 angka pada skala kemajuanmu?',
                        'Siapa orang di sekitarmu yang akan menyadari bahwa kamu sedang melangkah menjadi pribadi yang lebih tangguh, dan perubahan apa yang mereka lihat darimu?',
                    ],
                ],
            ],
            [
                'title' => 'Sesi 2: Mengenali Kekuatan Diri & Pengecualian Masalah (Exceptions & Strengths)',
                'values' => 'Efikasi Diri, Regulasi Emosi, Ketangguhan Mental',
                'description' => 'Tidak ada masalah yang berlangsung terus-menerus dengan intensitas yang sama setiap detik. Selalu ada "momen pengecualian" (exceptions)—yaitu saat-saat ketika keadaan terasa lebih tenang atau terkendali. Mengenali momen tersebut membantumu menyadari kekuatan internal yang sudah ada di dalam dirimu.',
                'order' => 2,
                'questions' => [
                    'W' => [
                        'Ketika kamu mampu mengelola emosi dan pikiranmu dengan lebih tenang, hal positif apa yang paling ingin kamu rasakan dalam keseharianmu?',
                        'Kualitas pribadi tangguh seperti apa yang ingin kamu tumbuhkan di dalam dirimu saat menghadapi tekanan?',
                    ],
                    'D' => [
                        'Kapan terakhir kali masalah yang kamu hadapi terasa lebih ringan atau tidak terlalu mengganggumu? Apa yang sedang kamu pikirkan atau lakukan pada saat itu?',
                        'Sebutkan minimal 3 kekuatan diri, bakat, atau kualitas positif yang kamu miliki yang selama ini membantumu tetap bertahan!',
                    ],
                    'E' => [
                        'Pada skala 1 sampai 10, seberapa yakin kamu bahwa kekuatan dirimu mampu membantumu menghadapi tantangan hari ini?',
                        'Hal baik apa yang sudah kamu lakukan minggu ini yang patut kamu apresiasi dari dirimu sendiri?',
                    ],
                    'P' => [
                        'Bagaimana cara kamu mengulangi atau memperbanyak "momen pengecualian" (hal-hal yang membuatmu merasa lebih baik) dalam minggu ini?',
                        'Kebiasaan positif kecil apa yang akan kamu pilih untuk dilakukan saat kamu mulai merasa tertekan kembali?',
                    ],
                ],
            ],
            [
                'title' => 'Sesi 3: Merancang Langkah Solusi & Dukungan Keberlanjutan (Scaling & Action Plan)',
                'values' => 'Kemandirian, Dukungan Sosial, Pemecahan Masalah Berfokus Solusi',
                'description' => 'Perubahan besar selalu dimulai dari langkah-langkah kecil yang konkret dan konsisten. Pada sesi ini, kamu diajak merumuskan rencana aksi nyata yang berada dalam kendalimu serta mengidentifikasi sumber daya dukungan di sekitarmu untuk menjaga ketangguhan dirimu.',
                'order' => 3,
                'questions' => [
                    'W' => [
                        'Perubahan nyata apa yang ingin kamu lihat dalam aktivitas belajar dan relasi sosialmu setelah menyelesaikan sesi self-help ini?',
                        'Apa tanda paling sederhana yang menunjukkan bahwa kamu sudah lebih tangguh (resilien) dibandingkan sebelumnya?',
                    ],
                    'D' => [
                        'Strategi atau cara apa yang selama ini paling berhasil membantumu bangkit ketika mengalami kegagalan atau kekecewaan?',
                        'Siapa saja orang atau lingkungan pendukung (keluarga, teman, guru BK/konselor) yang memberi energi positif bagi perkembangan dirimu?',
                    ],
                    'E' => [
                        'Pada skala 1 sampai 10, di angka berapa kesiapan dan komitmenmu saat ini untuk mempraktikkan solusi yang telah kamu temukan?',
                        'Apa yang kamu pelajari tentang ketangguhan dirimu setelah berefleksi melalui rangkaian sesi self-help ini?',
                    ],
                    'P' => [
                        'Tuliskan 2 langkah konkret, realistis, dan terukur yang akan kamu jalankan mulai hari ini untuk menjaga resiliensi dirimu!',
                        'Hal penting apa dari hasil sesi self-help ini yang ingin kamu komunikasikan atau diskusikan lebih lanjut bersama konselormu?',
                    ],
                ],
            ],
        ];

        foreach ($materials as $mData) {
            $material = Material::updateOrCreate(
                [
                    'tribe_id' => $module->id,
                    'title' => $mData['title']
                ],
                [
                    'values' => $mData['values'],
                    'description' => $mData['description'],
                    'order' => $mData['order'],
                ]
            );

            $order = 1;
            foreach ($mData['questions'] as $category => $qTexts) {
                foreach ($qTexts as $text) {
                    MaterialQuestion::firstOrCreate(
                        [
                            'material_id' => $material->id,
                            'category' => $category,
                            'text' => $text,
                        ],
                        [
                            'order' => $order++
                        ]
                    );
                }
            }
        }
    }
}

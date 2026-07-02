<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviewers = [
            ['nama' => 'Budi Santoso', 'komentar' => 'Makanan sangat enak, porsi pas, recomended!'],
            ['nama' => 'Siti Nurhaliza', 'komentar' => 'Pelayanan ramah, tempat nyaman, akan kembali lagi.'],
            ['nama' => 'Ahmad Rizki', 'komentar' => 'Rasa autentik, bahannya segar, worth it banget.'],
            ['nama' => 'Dewi Lestari', 'komentar' => 'Penyajian cantik, rasanya juga enak banget.'],
            ['nama' => 'Rudi Hartono', 'komentar' => 'Harganya sesuai dengan kualitas, recommended!'],
            ['nama' => 'Ani Wijaya', 'komentar' => 'Enak banget, ga nyesel pesen ini.'],
            ['nama' => 'Andi Pratama', 'komentar' => 'Pertama kali coba dan ternyata enak banget.'],
            ['nama' => 'Rina Marlina', 'komentar' => 'Porsinya besar, cocok untuk makan bersama.'],
            ['nama' => 'Dedi Kurniawan', 'komentar' => 'Menu favorit saya di sini, selalu pesan ini.'],
            ['nama' => 'Fitri Handayani', 'komentar' => 'Rasanya pas, ga terlalu asin/manis.'],
        ];

        $menus = Menu::all();

        foreach ($menus as $menu) {
            $usedReviewers = [];
            $numReviews = rand(3, 5);

            for ($i = 0; $i < $numReviews; $i++) {
                $reviewerIndex = array_rand($reviewers);
                
                // Avoid duplicate reviewer for same menu
                while (in_array($reviewerIndex, $usedReviewers)) {
                    $reviewerIndex = array_rand($reviewers);
                }
                $usedReviewers[] = $reviewerIndex;

                $reviewer = $reviewers[$reviewerIndex];

                Review::create([
                    'menu_id' => $menu->id,
                    'nama' => $reviewer['nama'],
                    'rating' => rand(3, 5),
                    'komentar' => $reviewer['komentar'],
                    'created_at' => now()->subDays(rand(1, 90)),
                ]);
            }

            // Update menu rating based on reviews
            $avgRating = $menu->reviews()->avg('rating');
            $menu->update(['rating' => round($avgRating, 1)]);
        }
    }
}

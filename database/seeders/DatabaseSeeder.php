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
            \Database\Seeders\SkillSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@fontaine.com'],
            [
                'name' => 'Fahri Noor Royyan',
                'password' => bcrypt('password'), // Silakan ganti ini saat deploy
            ]
        );

        \App\Models\Project::insert([
            [
                'title' => 'Oratrice Core System',
                'slug' => 'oratrice-core-system',
                'description' => 'Sistem operasi utama dari Oratrice Mecanique d\'Analyse Cardinale. Menggunakan algoritma keadilan untuk memberikan penilaian mutlak di pengadilan Fontaine.',
                'tech' => 'Laravel, MySQL, Vue.js, Tailwind CSS',
                'github' => 'https://github.com/fahrinoor/oratrice-core',
                'demo' => 'https://oratrice.fontaine.gov',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Salon Solitaire Reservation',
                'slug' => 'salon-solitaire-reservation',
                'description' => 'Aplikasi web reservasi untuk mendatangkan para member Salon Solitaire (Gentilhomme Usher, Surintendante Chevalmarin, Mademoiselle Crabaletta) untuk acara minum teh harian Furina.',
                'tech' => 'Laravel, Livewire, Alpine.js',
                'github' => 'https://github.com/fahrinoor/salon-solitaire',
                'demo' => 'https://salon-solitaire.teatime',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Steambird News Portal',
                'slug' => 'steambird-news-portal',
                'description' => 'Portal berita utama di Fontaine yang dioperasikan oleh The Steambird. CMS dibangun dengan Laravel dan artikel disajikan secara real-time untuk seluruh warga Teyvat.',
                'tech' => 'Laravel, React, Redis, MySQL',
                'github' => 'https://github.com/fahrinoor/steambird-news',
                'demo' => 'https://thesteambird.fontaine.gov',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fontaine Water Management',
                'slug' => 'fontaine-water-management',
                'description' => 'Sistem pemantauan kualitas air dan ketinggian air laut Fontaine berbasis IoT. Mengontrol sistem drainase bawah tanah untuk mencegah banjir letusan air purba.',
                'tech' => 'Laravel, Python, MQTT, Tailwind CSS',
                'github' => null,
                'demo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

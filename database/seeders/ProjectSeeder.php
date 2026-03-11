<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Perizinan Siswa',
                'description' => 'Aplikasi manajemen izin siswa berbasis Laravel dengan dashboard admin, wali kelas, dan siswa. Memungkinkan pemantauan real-time.',
                'tech' => 'Laravel, MySQL, Tailwind CSS, Alpine.js',
                'github' => 'https://github.com/PPLG-SMKTI-27/perizinan-siswa',
            ],
            [
                'title' => 'Car Rental Management',
                'description' => 'Sistem penyewaan mobil yang mencakup manajemen armada, transaksi pelanggan, dan laporan pendapatan otomatis.',
                'tech' => 'Laravel, Blade, MySQL, Bootstrap',
                'github' => 'https://github.com/PPLG-SMKTI-27/car-rental',
            ],
            [
                'title' => 'Furina Portfolio Showcase',
                'description' => 'Website portofolio interaktif dengan estetik Fontaine. Menggunakan GSAP untuk animasi premium dan tsParticles.',
                'tech' => 'Laravel, GSAP, Tailwind, Blade',
                'github' => 'https://github.com/PPLG-SMKTI-27/furina-portfolio',
            ],
            [
                'title' => 'E-Library SMKN 27',
                'description' => 'Platform perpustakaan digital untuk mempermudah peminjaman buku dan manajemen koleksi pustaka secara daring.',
                'tech' => 'PHP, MySQL, Tailwind',
                'github' => 'https://github.com/PPLG-SMKTI-27/e-library',
            ],
            [
                'title' => 'Admin Dashboard Hub',
                'description' => 'Satu tempat untuk mengelola semua aplikasi. Mencakup analitik performa, manajemen user, dan log sistem.',
                'tech' => 'Laravel, Chart.js, MySQL',
                'github' => 'https://github.com/PPLG-SMKTI-27/admin-hub',
            ],
            [
                'title' => 'Fontaine Blog',
                'description' => 'CMS blog kustom dengan fitur tagging, pencarian konten, dan sistem komentar moderasi modern.',
                'tech' => 'Laravel, MySQL, Blade',
                'github' => 'https://github.com/PPLG-SMKTI-27/fontaine-blog',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                [
                    'title' => $project['title'],
                    'description' => $project['description'],
                    'tech' => $project['tech'],
                    'github' => $project['github'] ?? '#',
                    'demo' => '#',
                ]
            );
        }
    }
}

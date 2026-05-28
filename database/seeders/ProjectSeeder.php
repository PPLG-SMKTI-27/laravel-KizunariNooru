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
                'title' => [
                    'id' => 'Sistem Perizinan Siswa',
                    'en' => 'Student Permission System',
                    'ja' => '生徒許可システム',
                ],
                'description' => [
                    'id' => 'Aplikasi manajemen izin siswa berbasis Laravel dengan dashboard admin, wali kelas, dan siswa. Memungkinkan pemantauan real-time.',
                    'en' => 'A Laravel-based student permission management app with admin, homeroom teacher, and student dashboards. Enables real-time monitoring.',
                    'ja' => 'Laravel ベースの生徒許可管理アプリ。管理者、担任、生徒用のダッシュボードを備え、リアルタイム監視が可能です。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'Laravel, MySQL, Tailwind CSS, Alpine.js',
                'github' => 'https://github.com/PPLG-SMKTI-27/perizinan-siswa',
            ],
            [
                'title' => [
                    'id' => 'Manajemen Sewa Mobil',
                    'en' => 'Car Rental Management',
                    'ja' => 'レンタカー管理',
                ],
                'description' => [
                    'id' => 'Sistem penyewaan mobil yang mencakup manajemen armada, transaksi pelanggan, dan laporan pendapatan otomatis.',
                    'en' => 'A car rental system covering fleet management, customer transactions, and automated revenue reports.',
                    'ja' => '車両管理、顧客取引、自動収益レポートを備えたレンタカーシステム。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'Laravel, Blade, MySQL, Bootstrap',
                'github' => 'https://github.com/PPLG-SMKTI-27/car-rental',
            ],
            [
                'title' => [
                    'id' => 'Furina Portfolio Showcase',
                    'en' => 'Furina Portfolio Showcase',
                    'ja' => 'フリーナ・ポートフォリオ・ショーケース',
                ],
                'description' => [
                    'id' => 'Website portofolio interaktif dengan estetik Fontaine. Menggunakan GSAP untuk animasi premium dan tsParticles.',
                    'en' => 'An interactive portfolio website with Fontaine aesthetics. Uses GSAP for premium animations and tsParticles.',
                    'ja' => 'フォンテーヌの美学を持つインタラクティブなポートフォリオサイト。GSAPによるプレミアムアニメーションとtsParticlesを使用。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'Laravel, GSAP, Tailwind, Blade',
                'github' => 'https://github.com/PPLG-SMKTI-27/furina-portfolio',
            ],
            [
                'title' => [
                    'id' => 'E-Library SMKN 27',
                    'en' => 'E-Library SMKN 27',
                    'ja' => 'E-ライブラリ SMKN 27',
                ],
                'description' => [
                    'id' => 'Platform perpustakaan digital untuk mempermudah peminjaman buku dan manajemen koleksi pustaka secara daring.',
                    'en' => 'A digital library platform to simplify book borrowing and online collection management.',
                    'ja' => '書籍の貸出とオンライン蔵書管理を簡素化するデジタル図書館プラットフォーム。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'PHP, MySQL, Tailwind',
                'github' => 'https://github.com/PPLG-SMKTI-27/e-library',
            ],
            [
                'title' => [
                    'id' => 'Admin Dashboard Hub',
                    'en' => 'Admin Dashboard Hub',
                    'ja' => '管理ダッシュボードハブ',
                ],
                'description' => [
                    'id' => 'Satu tempat untuk mengelola semua aplikasi. Mencakup analitik performa, manajemen user, dan log sistem.',
                    'en' => 'A single place to manage all applications. Includes performance analytics, user management, and system logs.',
                    'ja' => 'すべてのアプリケーションを管理する一元的な場所。パフォーマンス分析、ユーザー管理、システムログを含みます。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'Laravel, Chart.js, MySQL',
                'github' => 'https://github.com/PPLG-SMKTI-27/admin-hub',
            ],
            [
                'title' => [
                    'id' => 'Fontaine Blog',
                    'en' => 'Fontaine Blog',
                    'ja' => 'フォンテーヌ・ブログ',
                ],
                'description' => [
                    'id' => 'CMS blog kustom dengan fitur tagging, pencarian konten, dan sistem komentar moderasi modern.',
                    'en' => 'A custom blog CMS with tagging, content search, and a modern comment moderation system.',
                    'ja' => 'タグ付け、コンテンツ検索、モダンなコメントモデレーションシステムを備えたカスタムブログCMS。',
                ],
                'category' => [
                    'id' => 'Pengembangan Web',
                    'en' => 'Web Development',
                    'ja' => 'ウェブ開発',
                ],
                'tech' => 'Laravel, MySQL, Blade',
                'github' => 'https://github.com/PPLG-SMKTI-27/fontaine-blog',
            ],
        ];

        foreach ($projects as $project) {
            $slugBase = $project['title']['en'] ?? $project['title']['id'];
            Project::updateOrCreate(
                ['slug' => Str::slug($slugBase)],
                [
                    'title' => $project['title'],
                    'description' => $project['description'],
                    'category' => $project['category'] ?? null,
                    'tech' => $project['tech'],
                    'github' => $project['github'] ?? '#',
                    'demo' => '#',
                ]
            );
        }
    }
}

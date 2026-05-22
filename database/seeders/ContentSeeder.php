<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Default Settings
        $settings = [
            'hero_name'      => 'Fahri Noor Royyan',
            // Hero tagline now handled in Blade with typewriter effect
            'hero_bio'       => 'Crafting fluid digital solutions with a blend of technical precision and aesthetic elegance.',
            'hero_badge'     => 'Ready for Collaboration',
            'cv_file'        => 'CV_Fahri_Noor_Royyan.png',
            'stat_1_value'   => '2+',
            'stat_1_label'   => 'Years Experience',
            'stat_2_value'   => '3+',
            'stat_2_label'   => 'Delivered Projects',
            'stat_3_value'   => '100%',
            'stat_3_label'   => 'Client Satisfaction',
            'stat_4_value'   => '5+',
            'stat_4_label'   => 'Technologies',
            'contact_email'  => '24_fahrinoor@student.smkti.net',
            'contact_location' => 'Samarinda, Kaltim',
            'social_github'  => 'https://github.com/rusherimfa',
            'social_linkedin'=> 'https://www.linkedin.com/in/fahri-noor-royyan-66ba803a2',
            'social_instagram'=> 'https://instagram.com/rusherimfaa',
            'social_whatsapp' => 'https://wa.me/6282353830741',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // Default Certificates
        $certificates = [
            [
                'title'    => 'Advanced Laravel Architecture',
                'issuer'   => 'Laracasts',
                'category' => 'Programming',
                'date'     => 'In Progress',
                'progress' => 85,
                'icon_svg' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'sort_order' => 1,
            ],
            [
                'title'    => 'Vue.js 3 Masterclass',
                'issuer'   => 'Vue School',
                'category' => 'Programming',
                'date'     => 'In Progress',
                'progress' => 60,
                'icon_svg' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'sort_order' => 2,
            ],
            [
                'title'    => 'MySQL Performance Tuning',
                'issuer'   => 'Database Academy',
                'category' => 'Database',
                'date'     => 'In Progress',
                'progress' => 75,
                'icon_svg' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
                'sort_order' => 3,
            ],
            [
                'title'    => 'Redis Caching Dynamics',
                'issuer'   => 'Pluralsight',
                'category' => 'Database',
                'date'     => 'Planned',
                'progress' => 10,
                'icon_svg' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                'sort_order' => 4,
            ],
            [
                'title'    => 'Docker for PHP Developers',
                'issuer'   => 'Docker',
                'category' => 'Tools',
                'date'     => 'In Progress',
                'progress' => 45,
                'icon_svg' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                'sort_order' => 5,
            ],
            [
                'title'    => 'Git Workflow Mastery',
                'issuer'   => 'GitHub',
                'category' => 'Tools',
                'date'     => 'Completed',
                'progress' => 100,
                'icon_svg' => 'M8 16a2 2 0 001.93-.5m0 0v-8m0 8a2 2 0 100-4h.01M12 20a2 2 0 100-4 2 2 0 000 4zm0-12a2 2 0 100-4 2 2 0 000 4z',
                'sort_order' => 6,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::firstOrCreate(['title' => $cert['title'], 'issuer' => $cert['issuer']], $cert);
        }

        // Default Services
        $services = [
            [
                'title'       => 'Full-Stack Development',
                'label'       => 'Scalable Systems',
                'description' => 'Building robust, responsive, and high-performance web architectures utilizing the modern Laravel ecosystem and advanced JS frameworks.',
                'svg_path'    => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'UI/UX Implementation',
                'label'       => 'Visual Identity',
                'description' => 'Transforming creative design concepts into interactive, pixel-perfect interfaces that prioritize user experience and fluid animations.',
                'svg_path'    => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Performance Optimization',
                'label'       => 'Optimal Speed',
                'description' => 'Analyzing and optimizing digital systems, database queries, and frontend assets for maximum speed, security, and scalability.',
                'svg_path'    => 'M13 10V3L4 14h7v7l9-11h-7z',
                'sort_order'  => 3,
            ],
        ];

        foreach ($services as $svc) {
            Service::firstOrCreate(['title' => $svc['title']], $svc);
        }

        $this->command->info('Content seeded successfully!');
    }
}

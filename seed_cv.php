<?php

use App\Models\Setting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;

// Update Settings
Setting::set('hero_name', 'Fahri Noor Royyan');
Setting::set('hero_tagline', 'Pengembangan Perangkat Lunak dan Gim');
Setting::set('hero_bio', 'Saya adalah siswa PPLG angkatan 24 di SMK TI Airlangga Samarinda yang memiliki minat di bidang teknologi, programming, dan pengembangan website. Saya senang mempelajari hal baru serta mengembangkan keterampilan di dunia IT.');
Setting::set('contact_email', 'fahrinoorroyyan@gmail.com');
Setting::set('contact_location', 'Samarinda, Kalimantan Timur');
Setting::set('social_whatsapp', 'https://wa.me/6282353830741');
Setting::set('contact_website', 'fahri.f3bytes.my.id');

// Insert Hard Skills
$hardSkills = ['WEB Development', 'AI Prompting', 'Git & GitHub', 'Laravel & PHP', 'AI Tools Usage'];
foreach($hardSkills as $s) {
    Skill::updateOrCreate(['name' => $s], ['category' => 'Hard Skill', 'percentage' => 85]);
}

// Insert Soft Skills
$softSkills = ['Problem Solving', 'Teamwork', 'Adaptasi Teknologi'];
foreach($softSkills as $s) {
    Skill::updateOrCreate(['name' => $s], ['category' => 'Soft Skill', 'percentage' => 90]);
}

// Education & Awards (Can be added as certificates or experiences if applicable)
Certificate::updateOrCreate(
    ['title' => 'Siswa PPLG (2024-2026)'],
    [
        'issuer' => 'SMKTI AIRLANGGA',
        'category' => 'Programming', // 'Education' is not allowed in enum
        'date' => '2024-2026',
        'progress' => 50,
        'icon_svg' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z'
    ]
);

Certificate::updateOrCreate(
    ['title' => 'Oracle Database Foundation - 2026'],
    [
        'issuer' => 'Oracle',
        'category' => 'Database',
        'date' => '2026',
        'progress' => 100,
        'icon_svg' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
    ]
);

echo "Data CV berhasil diupdate!\n";

<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\Certificate;

try {
    DB::statement("ALTER TABLE certificates MODIFY COLUMN category ENUM('Programming', 'Database', 'Tools', 'Seminar') DEFAULT 'Programming'");
    
    Certificate::updateOrCreate(
        ['title' => 'Web Development Summit 2024'],
        [
            'issuer' => 'Tech Conference',
            'category' => 'Seminar',
            'date' => 'Mar 2024',
            'progress' => 100,
            'credential_url' => 'https://example.com',
            'icon_svg' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm0 0v6',
        ]
    );

    echo "Seminar category added and seeded.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

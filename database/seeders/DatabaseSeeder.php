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
            \Database\Seeders\ProjectSeeder::class,
            \Database\Seeders\ContentSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'fahrinoorroyyan@gmail.com'],
            [
                'name' => 'Fahri Noor Royyan',
                'password' => bcrypt('password'), // Silakan ganti ini saat deploy
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@fontaine.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
    }
}

<?php
// database/seeders/AdminUserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@furinadev.com')->exists();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Admin Furina',
                'email' => 'admin@furinadev.com',
                'password' => Hash::make('Admin123!'),
                // HAPUS 'is_admin' DULU sementara
                // 'is_admin' => true,
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('🎉 Admin user created successfully!');
            $this->command->info('📧 Email: admin@furinadev.com');
            $this->command->info('🔑 Password: Admin123!');
        } else {
            $this->command->info('✅ Admin user already exists!');
        }
        
        // COMMENT DULU user biasa
        // $userExists = User::where('email', 'user@example.com')->exists();
        // if (!$userExists) {
        //     User::create([
        //         'name' => 'Regular User',
        //         'email' => 'user@example.com',
        //         'password' => Hash::make('User123!'),
        //         'is_admin' => false,
        //         'email_verified_at' => now(),
        //     ]);
        // }
    }
}
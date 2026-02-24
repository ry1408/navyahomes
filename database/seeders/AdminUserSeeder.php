<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('Yadavraj@1408'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Create regular user for testing
        User::firstOrCreate(
            ['email' => 'user@navyahomes.com'],
            [
                'name' => 'Regular User',
                'email' => 'user@navyahomes.com',
                'password' => Hash::make('user123'),
                'email_verified_at' => now(),
                'role' => 'user',
            ]
        );
    }
}

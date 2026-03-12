<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default admin account
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '09171234567',
            'address' => 'Admin HQ, Metro City',
            'is_active' => true,
        ]);

        // Seed default regular user account
        User::create([
            'name' => 'Regular User',
            'email' => 'a@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '09170000000',
            'address' => 'Sample Street, Metro City',
            'is_active' => true,
        ]);

        // Seed products, categories, brands, and product photos
        $this->call(ProductSeeder::class);
    }
}

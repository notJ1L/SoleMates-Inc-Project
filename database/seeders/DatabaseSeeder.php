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
            'email_verified_at' => now(),
            'role' => 'admin',
            'phone' => '09171234567',
            'address' => 'Admin HQ, Metro City',
            'is_active' => true,
        ]);

        // Seed products, categories, brands, and product photos FIRST
        $this->call(ProductSeeder::class);

        // Seed users with orders and reviews AFTER products
        $this->call(UserSeeder::class);
    }
}

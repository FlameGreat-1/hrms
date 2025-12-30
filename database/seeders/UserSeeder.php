<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hrms.com',
            'password' => Hash::make('admin123hrms'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@hrms.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::factory(3)->create();
    }
}

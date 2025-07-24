<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ravi@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Default password
                'email_verified_at' => now(),
                'is_admin' => true,

            ]
        );
    }
}

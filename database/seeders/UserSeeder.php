<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'azzkynabil@gmail.com'],
            [
                'name' => 'Admin nabil',
                'password' => bcrypt('nabilganteng123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@gmail.com'],
            [
                'name' => 'Budi Customer',
                'password' => bcrypt('password123'),
                'role' => 'customer',
            ]
        );
    }
}
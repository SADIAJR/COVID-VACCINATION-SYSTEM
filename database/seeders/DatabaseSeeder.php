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
        // Admin user
        User::updateOrCreate(
            ['email' => 'my@admin.com'],
            [
                'name'     => 'Admin',
                'email'    => 'my@admin.com',
                'password' => bcrypt('123'),
                'role'     => 'admin',
            ]
        );
    }
}

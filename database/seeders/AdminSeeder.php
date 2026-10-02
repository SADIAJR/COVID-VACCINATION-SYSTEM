<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'my@admin.com'],
            [
                'name'     => 'Admin',
                'email'    => 'my@admin.com',
                'password' => Hash::make('123'),
                'role'     => 'admin',
            ]
        );

        echo "Admin user created/updated successfully!\n";
        echo "Email: my@admin.com\n";
        echo "Password: 123\n";
    }
}

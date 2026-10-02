<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CheckAdmin extends Command
{
    protected $signature = 'admin:check';
    protected $description = 'Check if admin user exists, create one if not';

    public function handle()
    {
        $admins = User::where('role', 'admin')->get(['id', 'name', 'email', 'role']);

        if ($admins->isEmpty()) {
            $this->warn('No admin user found in database!');
            $this->info('Creating admin user...');

            $admin = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@covid.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]);

            $this->info('Admin created successfully!');
            $this->table(['ID', 'Name', 'Email', 'Role'], [[$admin->id, $admin->name, $admin->email, $admin->role]]);
            $this->newLine();
            $this->info('Login credentials:');
            $this->line('  Email   : admin@covid.com');
            $this->line('  Password: admin123');
        } else {
            $this->info('Admin user(s) found:');
            $this->table(
                ['ID', 'Name', 'Email', 'Role'],
                $admins->map(fn($u) => [$u->id, $u->name, $u->email, $u->role])->toArray()
            );
        }
    }
}

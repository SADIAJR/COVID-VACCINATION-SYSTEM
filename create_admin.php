<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

try {
    $user = User::updateOrCreate(
        ['email' => 'my@admin.com'],
        [
            'name'     => 'Admin',
            'email'    => 'my@admin.com',
            'password' => Hash::make('123'),
            'role'     => 'admin',
        ]
    );
    echo "Success! Admin user created/updated.\n";
    echo "ID: " . $user->id . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Role: " . $user->role . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'Kyle',
            'role' => 'admin',
            'password' => Hash::make('1234'),
            'landline_number' => null,
            'image' => null,
            'name' => 'Kyle',
            'email' => 'kyle@example.com',
            'mobile_number' => '555-1234',
            'address' => '123 Main St',
            'email_verified_at' => null,
            'active' => true,
        ]);

        User::create([
            'username' => 'Sam',
            'role' => 'cashier',
            'password' => Hash::make('1234'),
            'landline_number' => null,
            'image' => null,
            'name' => 'Sam',
            'email' => 'sam@example.com',
            'mobile_number' => '555-5678',
            'address' => '456 Side St',
            'email_verified_at' => null,
            'active' => true,
        ]);

        User::create([
            'username' => 'Karl',
            'role' => 'bogus',
            'password' => Hash::make('1234'),
            'landline_number' => null,
            'image' => null,
            'name' => 'Karl',
            'email' => 'karl@example.com',
            'mobile_number' => '666-5678',
            'address' => '456 Left St',
            'email_verified_at' => null,
            'active' => false,
        ]);
    }
}

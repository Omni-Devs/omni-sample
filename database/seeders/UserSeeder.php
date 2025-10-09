<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // --- Create Roles ---
        $adminRole   = Role::firstOrCreate(['name' => 'Administrator']);
        $cashierRole = Role::firstOrCreate(['name' => 'Cashier']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager']);

        // --- Create Users ---
        $kyle = User::create([
            'username' => 'Kyle',
            'password' => Hash::make('1234'),
            'image' => null,
            'name' => 'Kyle',
            'email' => 'kyle@example.com',
            'mobile_number' => '555-1234',
            'address' => '123 Main St',
            'status' => 'active',
        ]);

        $sam = User::create([
            'username' => 'Sam',
            'password' => Hash::make('1234'),
            'image' => null,
            'name' => 'Sam',
            'email' => 'sam@example.com',
            'mobile_number' => '555-5678',
            'address' => '456 Side St',
            'status' => 'active',
        ]);

        $karl = User::create([
            'username' => 'Karl',
            'password' => Hash::make('1234'),
            'image' => null,
            'name' => 'Karl',
            'email' => 'karl@example.com',
            'mobile_number' => '666-5678',
            'address' => '789 Left St',
            'status' => 'active',
        ]);

        // --- Assign Roles ---
        // Kyle has 2 roles
        $kyle->roles()->attach([$adminRole->id, $managerRole->id]);

        // Sam has 1 role
        $sam->roles()->attach($cashierRole->id);

        // Karl has 1 role
        $karl->roles()->attach($managerRole->id);
    }
}

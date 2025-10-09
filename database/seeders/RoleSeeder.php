<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
        ['name' => 'Administrator'],
        ['name' => 'Manager'],
        ['name' => 'Cashier'],
        ['name' => 'Waiter'],
        ['name' => 'Chef'],
        ['name' => 'Cook'],
        ['name' => 'Bartender'],
        ['name' => 'Utility'],
    ]);
    }
}

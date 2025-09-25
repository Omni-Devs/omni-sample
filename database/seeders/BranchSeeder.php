<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create([
            'name' => 'Main Branch',
            'mobile_number' => '09171234567',
            'phone_number' => '028123456',
            'email' => 'main@branch.com',
            'tin' => '123-456-789',
            'address' => '123 Main St, Cityville',
        ]);
        Branch::create([
            'name' => 'North Branch',
            'mobile_number' => '09179876543',
            'phone_number' => '028765432',
            'email' => 'north@branch.com',
            'tin' => '987-654-321',
            'address' => '456 North Ave, Uptown',
        ]);
        Branch::create([
            'name' => 'South Branch',
            'mobile_number' => '09177654321',
            'phone_number' => '028654321',
            'email' => 'south@branch.com',
            'tin' => '654-321-987',
            'address' => '789 South Rd, Downtown',
        ]);
    }
}

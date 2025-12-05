<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Temporarily allow all old and new statuses
        DB::statement("
            ALTER TABLE `users` 
            CHANGE `status` `status` 
            ENUM('active','archived','resigned','terminated') 
            NOT NULL DEFAULT 'active'
        ");

        // Step 2: Update old 'archived' values to 'terminated'
        DB::table('users')->where('status', 'archived')->update(['status' => 'terminated']);

        // Step 3: Remove 'archived' from enum (optional)
        DB::statement("
            ALTER TABLE `users` 
            CHANGE `status` `status` 
            ENUM('active','resigned','terminated') 
            NOT NULL DEFAULT 'active'
        ");
    }

    public function down(): void
    {
        // Step 1: Add archived back temporarily
        DB::statement("
            ALTER TABLE `users` 
            CHANGE `status` `status` 
            ENUM('active','resigned','terminated','archived') 
            NOT NULL DEFAULT 'active'
        ");

        // Step 2: Convert terminated/resigned back to archived
        DB::table('users')->whereIn('status', ['resigned','terminated'])->update(['status' => 'archived']);

        // Step 3: Remove resigned/terminated if needed
        DB::statement("
            ALTER TABLE `users` 
            CHANGE `status` `status` 
            ENUM('active','archived') 
            NOT NULL DEFAULT 'active'
        ");
    }
};

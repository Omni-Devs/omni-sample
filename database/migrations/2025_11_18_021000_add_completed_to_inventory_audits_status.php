<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the enum to include 'completed'
        // Using raw statement for MySQL to avoid doctrine/dbal dependency
        DB::statement("ALTER TABLE `inventory_audits` MODIFY `status` ENUM('active','archived','completed') NOT NULL DEFAULT 'active'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum (without 'completed')
        DB::statement("ALTER TABLE `inventory_audits` MODIFY `status` ENUM('active','archived') NOT NULL DEFAULT 'active'");
    }
};

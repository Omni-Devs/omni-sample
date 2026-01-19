<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Use raw SQL ALTER to make `email` column nullable. This avoids requiring doctrine/dbal.
        DB::statement('ALTER TABLE `users` MODIFY `email` VARCHAR(255) NULL;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert email to NOT NULL. This will fail if NULL values exist; run with caution.
        DB::statement('ALTER TABLE `users` MODIFY `email` VARCHAR(255) NOT NULL;');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Make the name column case-insensitive
        DB::statement('ALTER TABLE departments MODIFY name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL');

        // Add unique index
        Schema::table('departments', function (Blueprint $table) {
            $table->unique('name');
        });
    }

    public function down(): void
    {
        // Drop unique index
        Schema::table('departments', function (Blueprint $table) {
            $table->dropUnique(['name']);
        });

        // Revert back to binary (case-sensitive)
        DB::statement('ALTER TABLE departments MODIFY name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL');
    }
};

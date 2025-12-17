<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {
            DB::statement("ALTER TABLE `cash_audits` MODIFY `status` ENUM('open', 'closed', 'pending', 'completed') NOT NULL DEFAULT 'open'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {
            DB::statement("ALTER TABLE `cash_audits` MODIFY `status` ENUM('open', 'closed') NOT NULL DEFAULT 'open'");
        });
    }
};

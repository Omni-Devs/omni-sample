<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // STEP 1: Add the column as nullable first
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->foreignId('branch_id')->nullable()->after('cashier_id');
        });

        // STEP 2: Fill all existing rows with a valid branch (use your main branch ID)
        DB::table('cash_audits')
            ->whereNull('branch_id')
            ->update(['branch_id' => 1]);   // Change 1 to your main branch ID if different

        // STEP 3: Make it NOT NULL + add default
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->foreignId('branch_id')
                  ->nullable(false)
                  ->default(1)              // Change 1 if needed
                  ->change();
        });

        // STEP 4: Add foreign key constraint
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches')
                  ->onDelete('cascade');    // or 'restrict' if you prefer
        });
    }

    public function down(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
        });
    }
};
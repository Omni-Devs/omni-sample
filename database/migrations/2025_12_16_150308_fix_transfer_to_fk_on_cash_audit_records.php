<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cash_audit_records', function (Blueprint $table) {
            $table->dropForeign(['transfer_to']);

            $table->foreign('transfer_to')
                  ->references('id')
                  ->on('cash_equivalents')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_audit_records', function (Blueprint $table) {
            $table->dropForeign(['transfer_to']);

            $table->foreign('transfer_to')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();
        });
    }
};

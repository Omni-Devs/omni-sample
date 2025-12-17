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
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->foreignId('cash_audit_record_id')
                ->nullable()
                ->after('id')
                ->constrained('cash_audit_records')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->dropForeign(['cash_audit_record_id']);
            $table->dropColumn('cash_audit_record_id');
        });
    }
};

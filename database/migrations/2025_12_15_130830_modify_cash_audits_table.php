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
            $table->string('reference_no')->nullable()->after('id');
            $table->unsignedBigInteger('transfer_to')->nullable()->after('transfer_amount');
            if (Schema::hasColumn('cash_audits', 'transfer_to')) {
                $table->unsignedBigInteger('transfer_to')->nullable()->change();
                $table->foreign('transfer_to')
                      ->references('id')
                      ->on('cash_equivalents')
                      ->onDelete('set null');
                      }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {
            $table->dropColumn('reference_no');
            if (Schema::hasColumn('cash_audits', 'transfer_to')) {
                $table->dropForeign(['transfer_to']);
            }
        });
    }
};

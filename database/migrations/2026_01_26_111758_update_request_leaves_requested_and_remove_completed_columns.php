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
        Schema::table('request_leaves', function (Blueprint $table) {

            // ✅ ADD requested fields (FK to users)
            $table->foreignId('requested_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete()
                  ->after('status');

            $table->timestamp('requested_datetime')
                  ->nullable()
                  ->after('requested_by');

            // ❌ REMOVE completed fields
            $table->dropColumn([
                'completed_by',
                'completed_datetime',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_leaves', function (Blueprint $table) {

            // 🔁 RESTORE completed fields
            $table->unsignedBigInteger('completed_by')
                  ->nullable()
                  ->after('cancelled_datetime');

            $table->timestamp('completed_datetime')
                  ->nullable()
                  ->after('completed_by');

            // 🔁 REMOVE requested fields
            $table->dropColumn([
                'requested_by',
                'requested_datetime',
            ]);
        });
    }
};

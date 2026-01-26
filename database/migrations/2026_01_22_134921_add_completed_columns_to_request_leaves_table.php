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
            $table->unsignedBigInteger('completed_by')
                  ->nullable()
                  ->after('cancelled_by');

            $table->dateTime('completed_datetime')
                  ->nullable()
                  ->after('completed_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_leaves', function (Blueprint $table) {
            $table->dropColumn([
                'completed_by',
                'completed_datetime'
            ]);
        });
    }
};

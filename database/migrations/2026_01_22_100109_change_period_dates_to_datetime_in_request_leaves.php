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
            $table->dateTime('period_start')->change();
            $table->dateTime('period_end')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_leaves', function (Blueprint $table) {
            $table->date('period_start')->change();
            $table->date('period_end')->change();
        });
    }
};

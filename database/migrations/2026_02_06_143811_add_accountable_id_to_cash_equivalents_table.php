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
        Schema::table('cash_equivalents', function (Blueprint $table) {
            $table->foreignId('accountable_id')
                ->nullable()
                ->after('id') // adjust position if needed
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_equivalents', function (Blueprint $table) {
            $table->dropForeign(['accountable_id']);
            $table->dropColumn('accountable_id');
        });
    }
};

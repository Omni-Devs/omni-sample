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
            $table->decimal('conversion_in_peso', 15, 2)->nullable()->after('type_of_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_equivalents', function (Blueprint $table) {
            $table->dropColumn('conversion_in_peso');
        });
    }
};

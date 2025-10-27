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
        Schema::table('inventory_deductions', function (Blueprint $table) {
            $table->enum('deduction_type', ['served', 'wastage', 'spoilage', 'theft'])
                  ->default('served')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('inventory_deductions', function (Blueprint $table) {
            $table->enum('deduction_type', ['served', 'waste'])
                  ->default('served')
                  ->change();
        });
    }
};

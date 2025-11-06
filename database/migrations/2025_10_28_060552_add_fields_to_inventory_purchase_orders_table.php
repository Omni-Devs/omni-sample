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
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            $table->string('proforma_reference_number')->nullable()->after('prf_reference_number');
                $table->enum('select_origin', ['local', 'international'])->default('local')->change();
                $table->timestamp('created_at')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            $table->dropColumn('proforma_reference_number');
        });
    }
};

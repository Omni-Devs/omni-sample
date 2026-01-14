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
        Schema::table('branch_components', function (Blueprint $table) {

            // 🔹 Change onhand precision (from 4 → 2 decimals)
            $table->decimal('onhand', 15, 2)->change();

            // 🔹 Pricing
            $table->decimal('cost', 15, 2)->nullable()->after('onhand');
            $table->decimal('price', 15, 2)->nullable()->after('cost');

            // 🔹 Status & selling
            $table->string('status')->default('active')->after('price');
            $table->boolean('for_sale')->default(true)->after('status');

            // 🔹 Supplier
            $table->foreignId('supplier_id')
                ->nullable()
                ->after('for_sale')
                ->constrained('suppliers')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_components', function (Blueprint $table) {

            // Drop FK first
            $table->dropForeign(['supplier_id']);

            // Drop added columns
            $table->dropColumn([
                'cost',
                'price',
                'status',
                'for_sale',
                'supplier_id',
            ]);

            // Revert onhand precision back to 4 decimals
            $table->decimal('onhand', 15, 4)->change();
        });
    }
};

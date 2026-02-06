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
        Schema::table('branch_products', function (Blueprint $table) {
             $table->decimal('cost', 12, 2)->after('product_id');
            $table->decimal('price', 12, 2)->after('cost');
            $table->string('status')->default('active')->after('price');

            $table->unsignedBigInteger('supplier_id')
                  ->nullable()
                  ->after('status');

            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('suppliers')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_products', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropColumn([
                'cost',
                'price',
                'status',
                'supplier_id',
            ]);
        });
    }
};

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
        Schema::table('order_items', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['product_id']);
            // Then drop the column
            $table->dropColumn('product_id');

            // Add new product_name column
            $table->string('product_name')->after('order_id');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('product_name');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }
};

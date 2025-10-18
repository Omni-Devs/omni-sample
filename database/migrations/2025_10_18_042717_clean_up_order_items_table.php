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
            // 🧹 Drop foreign key first (if it exists)
            if (Schema::hasColumn('order_items', 'order_id')) {
                try {
                    $table->dropForeign(['order_id']);
                } catch (\Exception $e) {
                    // Ignore if FK already removed
                }

                $table->dropColumn('order_id');
            }

            // 🧹 Drop other unused columns if they exist
            foreach (['product_name', 'qty', 'status'] as $col) {
                if (Schema::hasColumn('order_items', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Restore dropped columns if needed
            if (!Schema::hasColumn('order_items', 'order_id')) {
                $table->unsignedBigInteger('order_id')->nullable();
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            }

            foreach (['product_name', 'qty', 'status'] as $col) {
                if (!Schema::hasColumn('order_items', $col)) {
                    $table->string($col)->nullable();
                }
            }
        });
    }
};

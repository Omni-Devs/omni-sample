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
        Schema::table('order_details', function (Blueprint $table) {
            // Drop old foreign keys if they exist
            $table->dropForeign(['product_id']);
            $table->dropForeign(['component_id']);

            // Make both columns nullable
            $table->unsignedBigInteger('product_id')->nullable()->change();
            $table->unsignedBigInteger('component_id')->nullable()->change();

            // Re-add constraints
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');

            $table->foreign('component_id')
                  ->references('id')->on('components')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['component_id']);

            $table->unsignedBigInteger('product_id')->nullable(false)->change();
            $table->unsignedBigInteger('component_id')->nullable(false)->change();

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');

            $table->foreign('component_id')
                  ->references('id')->on('components')
                  ->onDelete('cascade');
        });
    }
};

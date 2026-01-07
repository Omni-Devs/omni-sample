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
        Schema::create('inventory_transfer_items', function (Blueprint $table) {
            $table->id();

            // Link to parent transfer
            $table->foreignId('inventory_transfer_id')
                  ->constrained('inventory_transfers')
                  ->onDelete('cascade');

            // Either a product or component
            $table->foreignId('product_id')
                  ->nullable()
                  ->constrained('products')
                  ->onDelete('set null');

            $table->foreignId('component_id')
                  ->nullable()
                  ->constrained('components')
                  ->onDelete('set null');

            $table->integer('quantity')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transfer_items');
    }
};

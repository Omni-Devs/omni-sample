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
    Schema::create('order_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');      // reference to orders
        $table->unsignedBigInteger('product_id');    // reference to products
        $table->integer('quantity')->default(1);     // must always have a value
        $table->decimal('price', 10, 2);             // price at order time
        $table->decimal('discount', 10, 2)->default(0.00); // discount per item
        $table->string('notes')->nullable();         // e.g. "no ice", "extra spicy"
        
        $table->timestamps();

        // Foreign keys
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

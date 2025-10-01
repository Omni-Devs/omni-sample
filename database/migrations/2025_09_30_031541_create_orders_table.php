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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');        // waiter/cashier
            $table->integer('table_no');                  // table number (not nullable)
            $table->integer('number_pax');                // number of people (not nullable)
            $table->enum('status', ['open', 'paid', 'cancelled', 'void'])->default('open');
            
            $table->timestamps();

            // Foreign key (assuming users table exists)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

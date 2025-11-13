<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_delivery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_purchase_order_id')->nullable()->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('delivery_receipt')->unique();
            $table->timestamp('received_at')->nullable();
            $table->timestamps();

            // Optionally add foreign keys if you want referential integrity
            // $table->foreign('inventory_purchase_order_id')->references('id')->on('inventory_purchase_orders')->onDelete('set null');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_delivery');
    }
};

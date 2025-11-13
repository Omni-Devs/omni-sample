<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('po_detail_receipts');
    }

    public function down()
    {
        Schema::create('po_detail_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_detail_id');
            $table->unsignedBigInteger('inventory_purchase_order_id');
            $table->unsignedBigInteger('component_id');
            $table->integer('qty_received')->default(0);
            $table->string('delivery_dr')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamps();

            $table->index('po_detail_id');
            $table->index('inventory_purchase_order_id');
            $table->index('component_id');
        });
    }
};

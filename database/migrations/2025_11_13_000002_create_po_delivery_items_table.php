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
        Schema::create('po_delivery_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_delivery_id')->index();
            $table->unsignedBigInteger('po_detail_id')->index();
            $table->unsignedBigInteger('component_id')->nullable()->index();
            $table->integer('qty_received')->default(0);
            $table->timestamps();

            // Optionally add FKs
            // $table->foreign('po_delivery_id')->references('id')->on('po_delivery')->onDelete('cascade');
            // $table->foreign('po_detail_id')->references('id')->on('po_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_delivery_items');
    }
};

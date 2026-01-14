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
        Schema::create('inventory_transfer_send_outs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inventory_transfer_id')
                ->constrained('inventory_transfers')
                ->cascadeOnDelete();

            $table->string('delivery_request_no')->unique();
            $table->string('personel_name');

            $table->json('items_onload');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transfer_send_outs');
    }
};

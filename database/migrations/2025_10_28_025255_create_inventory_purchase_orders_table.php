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
        Schema::create('inventory_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_number')->unique(); // PO #
            $table->unsignedBigInteger('user_id')->nullable(); // Requested by (from users table)
            $table->string('department')->nullable(); // Department
            $table->string('prf_reference_number')->nullable(); // PRF Reference #
            $table->string('type_of_request')->nullable(); // Type of Request *
            $table->string('select_origin')->nullable(); // Select Origin *
            $table->unsignedBigInteger('supplier_id')->nullable(); // Supplier *

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');

            // Date and Time Created
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_purchase_orders');
    }
};

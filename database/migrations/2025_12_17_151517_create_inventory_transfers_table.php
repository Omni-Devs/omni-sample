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
        Schema::create('inventory_transfers', function (Blueprint $table) {
            $table->id();
            // Datetime when transfer was requested
            $table->dateTime('requested_datetime');

            // Reference number
            $table->string('reference_no')->unique();

            // Transfer type enum
            $table->enum('transfer_type', ['request', 'send']);

            // Source branch
            $table->unsignedBigInteger('source_id');

            // Destination branch
            $table->unsignedBigInteger('destination_id');

            // Optional attached file
            $table->string('attached_file')->nullable();

            // Status enum with default
            $table->enum('status', [
                'pending',
                'approved',
                'in_transit',
                'completed',
                'disapproved',
                'archived'
            ])->default('pending');

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('source_id')
                  ->references('id')
                  ->on('branches')
                  ->onDelete('restrict');

            $table->foreign('destination_id')
                  ->references('id')
                  ->on('branches')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transfers');
    }
};

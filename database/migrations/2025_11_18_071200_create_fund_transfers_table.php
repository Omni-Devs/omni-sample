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
        Schema::create('fund_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('method_of_transfer_id')->nullable();
            $table->unsignedBigInteger('from_cash_equivalent_id')->nullable();
            $table->unsignedBigInteger('to_cash_equivalent_id')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'approved', 'archived'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('method_of_transfer_id')->references('id')->on('payments')->nullOnDelete();
            $table->foreign('from_cash_equivalent_id')->references('id')->on('cash_equivalents')->nullOnDelete();
            $table->foreign('to_cash_equivalent_id')->references('id')->on('cash_equivalents')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_transfers');
    }
};

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
        Schema::create('accounts_receivables_payments', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->unsignedBigInteger('account_receivable_id');
            $table->unsignedBigInteger('cash_equivalent_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();

            // Payment Details
            $table->decimal('amount', 15, 2);
            $table->dateTime('transaction_datetime');

            $table->timestamps();

            // FK Constraints
            $table->foreign('account_receivable_id')
                ->references('id')->on('accounts_receivables')
                ->onDelete('cascade');

            $table->foreign('cash_equivalent_id')
                ->references('id')->on('cash_equivalents')
                ->onDelete('set null');

            $table->foreign('payment_method_id')
                ->references('id')->on('payments')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts_receivables_payments');
    }
};

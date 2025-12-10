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
        Schema::create('cash_audits', function (Blueprint $table) {
            $table->id();

            // 🔹 Basic Info
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('cashier_id');
            $table->string('terminal_no', 50);
            $table->date('transaction_date');
            $table->time('transaction_time');

            // 🔹 Cash Handling
            $table->decimal('starting_fund', 10, 2)->default(0.00);
            $table->decimal('cash_sales', 12, 2)->default(0.00);
            $table->decimal('gcash_sales', 12, 2)->default(0.00);
            $table->decimal('bdo_sales', 12, 2)->default(0.00);
            $table->decimal('bpi_sales', 12, 2)->default(0.00);
            $table->decimal('receivable_bpi', 12, 2)->default(0.00);

            // 🔹 Summary Fields
            $table->decimal('tip', 12, 2)->default(0.00);
            $table->decimal('shortage', 12, 2)->default(0.00);
            $table->decimal('overage', 12, 2)->default(0.00);

            // 🔹 Cash Turnover Transfer
            $table->string('transfer_to', 100)->nullable();
            $table->decimal('transfer_amount', 12, 2)->default(0.00);

            // 🔹 Denomination Breakdown
            $table->integer('d_1000')->nullable();
            $table->integer('d_500')->nullable();
            $table->integer('d_200')->nullable();
            $table->integer('d_100')->nullable();
            $table->integer('d_50')->nullable();
            $table->integer('d_20')->nullable();
            $table->integer('d_10')->nullable();
            $table->integer('d_5')->nullable();
            $table->integer('d_1')->nullable();
            $table->integer('d_050')->nullable(); // ₱0.50
            $table->integer('d_025')->nullable(); // ₱0.25
            $table->integer('d_010')->nullable(); // ₱0.10
            $table->integer('d_005')->nullable(); // ₱0.05

            // 🔹 Miscellaneous
            $table->text('remarks')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->dateTime('closed_at')->nullable();

            // 🔹 Timestamps
            $table->timestamps();

            // 🔹 Indexes
            $table->index('branch_id');
            $table->index('cashier_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cash_audits');
    }
};

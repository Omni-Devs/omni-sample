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
        Schema::create('accounting_categories', function (Blueprint $table) {
            $table->id();

            // payable or receivable
            $table->enum('mode', ['payable', 'receivable']);

            // Category for PAYABLE
            $table->enum('category_payable', [
                'expenses',
                'assets',
                'sales',
                'payroll',
                'purchase_order',
                'non_sales'
            ])->nullable();

            // Category for RECEIVABLE
            $table->enum('category_receivable', [
                'output_taxes',
                'input_taxes',
                'sales',
                'payroll',
                'non_sales'
            ])->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
            $table->enum('status', ['active', 'archived'])
                    ->default('active');

            $table->string('type')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounting_categories');
    }
};

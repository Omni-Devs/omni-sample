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
        Schema::create('accounts_receivable_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accounts_receivable_id')
                  ->constrained('accounts_receivables')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('type_id'); // links to AccountingCategory
            $table->string('description')->nullable();
            $table->integer('qty')->default(0);
            $table->decimal('unit_price', 15, 2)->default(0);

            $table->unsignedBigInteger('tax_id')->nullable();
            $table->decimal('tax_amount', 15, 2)->default(0);

            $table->decimal('sub_total', 15, 2)->default(0);
            $table->decimal('total_amount', 15, 2)->default(0);

            $table->json('attachments')->nullable();

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('type_id')
                  ->references('id')
                  ->on('accounting_categories')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts_receivable_details');
    }
};

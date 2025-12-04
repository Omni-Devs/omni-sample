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
        Schema::create('account_payable_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('account_payable_id');
            $table->foreign('account_payable_id')
                ->references('id')
                ->on('account_payables')
                ->onDelete('cascade');

            $table->unsignedBigInteger('accounting_category_id');
            $table->foreign('accounting_category_id')
                ->references('id')
                ->on('accounting_categories');

            $table->text('description')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('amount_per_unit', 12, 2)->default(0);
            $table->decimal('total_amount', 14, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_payable_details');
    }
};

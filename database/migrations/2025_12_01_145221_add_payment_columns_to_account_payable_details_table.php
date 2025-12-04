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
        Schema::table('account_payable_details', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable()->after('account_payable_id');
            $table->unsignedBigInteger('cash_equivalent_id')->nullable()->after('payment_id');

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
            $table->foreign('cash_equivalent_id')->references('id')->on('cash_equivalents')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('account_payable_details', function (Blueprint $table) {
            $table->dropForeign(['payment_id']);
            $table->dropForeign(['cash_equivalent_id']);
            $table->dropColumn(['payment_id', 'cash_equivalent_id']);
        });
    }
};

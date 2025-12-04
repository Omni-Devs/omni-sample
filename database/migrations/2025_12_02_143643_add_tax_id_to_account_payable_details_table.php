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
            $table->unsignedBigInteger('tax_id')->nullable()->after('cash_equivalent_id');

            // remove old tax column
            if (Schema::hasColumn('account_payable_details', 'tax')) {
                $table->dropColumn('tax');
            }

            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('account_payable_details', function (Blueprint $table) {
            $table->dropForeign(['tax_id']);
            $table->dropColumn('tax_id');

            // restore old column
            $table->decimal('tax', 10, 2)->nullable();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            if (! Schema::hasColumn('inventory_purchase_orders', 'branch_id')) {
                $table->unsignedBigInteger('branch_id')->nullable()->after('created_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            if (Schema::hasColumn('inventory_purchase_orders', 'branch_id')) {
                $table->dropColumn('branch_id');
            }
        });
    }
};

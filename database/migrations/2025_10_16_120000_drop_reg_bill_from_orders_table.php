<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DropRegBillFromOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * Drop the reg_bill column if it exists.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('orders', 'reg_bill')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('reg_bill');
            });
        }
    }

    /**
     * Reverse the migrations.
     * Recreate the reg_bill column (nullable decimal).
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('orders', 'reg_bill')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->decimal('reg_bill', 12, 2)->nullable()->after('sr_pwd_discount');
            });
        }
    }
}

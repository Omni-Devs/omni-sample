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
        Schema::table('po_details', function (Blueprint $table) {
            if (! Schema::hasColumn('po_details', 'unit_cost')) {
                // store money as decimal(15,2)
                $table->decimal('unit_cost', 15, 2)->default(0)->after('qty');
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
        Schema::table('po_details', function (Blueprint $table) {
            if (Schema::hasColumn('po_details', 'unit_cost')) {
                $table->dropColumn('unit_cost');
            }
        });
    }
};

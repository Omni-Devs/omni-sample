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
            if (! Schema::hasColumn('po_details', 'delivery_dr')) {
                $table->string('delivery_dr')->nullable()->after('received_qty');
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
            if (Schema::hasColumn('po_details', 'delivery_dr')) {
                $table->dropColumn('delivery_dr');
            }
        });
    }
};

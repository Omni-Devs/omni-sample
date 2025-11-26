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
        Schema::table('fund_transfers', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('fund_transfers', function (Blueprint $table) {
            $table->dropColumn('branch_id');
        });
    }
};

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
        Schema::table('users', function (Blueprint $table) {
            // Make existing columns nullable. `change()` requires doctrine/dbal.
            $table->string('mobile_number', 20)->nullable()->change();
            $table->string('address', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number', 20)->nullable(false)->change();
            $table->string('address', 255)->nullable(false)->change();
        });
    }
};

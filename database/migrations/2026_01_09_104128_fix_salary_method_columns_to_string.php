<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            // Change method_id and period_id to string (varchar)
            $table->string('method_id')->nullable()->change();
            $table->string('period_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            // Revert if needed (be careful with data loss)
            $table->integer('method_id')->nullable()->change();
            $table->integer('period_id')->nullable()->change();
        });
    }
};
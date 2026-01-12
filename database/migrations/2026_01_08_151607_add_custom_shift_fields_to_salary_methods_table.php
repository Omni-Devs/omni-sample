<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            $table->string('custom_time_start')->nullable()->after('shift_id');
            $table->string('custom_time_end')->nullable();
            $table->string('custom_break_start')->nullable();
            $table->string('custom_break_end')->nullable();
        });
    }

    public function down()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            $table->dropColumn([
                'custom_time_start',
                'custom_time_end',
                'custom_break_start',
                'custom_break_end',
            ]);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            $table->json('custom_work_days')->nullable()->after('custom_break_end');
            $table->json('custom_rest_days')->nullable();
            $table->json('custom_open_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            $table->dropColumn(['custom_work_days', 'custom_rest_days', 'custom_open_time']);
        });
    }
};
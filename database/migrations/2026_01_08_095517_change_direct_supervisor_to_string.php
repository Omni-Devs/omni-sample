<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employee_work_informations', function (Blueprint $table) {
            $table->string('direct_supervisor')->nullable()->change();
            $table->string('position')->nullable()->after('designation_id');
        });
    }

    public function down(): void
    {
        Schema::table('employee_work_informations', function (Blueprint $table) {
            // rollback supervisor column
            $table->unsignedBigInteger('direct_supervisor')->nullable()->change();

            // rollback position column
            $table->dropColumn('position');
        });
    }
};

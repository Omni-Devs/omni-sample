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
        Schema::table('branches', function (Blueprint $table) {
            $table->string('permit_number')->nullable()->after('tin');
            $table->string('dti_issued')->nullable()->after('permit_number'); // corrected "DTU" to "DTI"
            $table->string('pos_sn')->nullable()->after('dti_issued');
            $table->string('min_number')->nullable()->after('pos_sn');
        });
    }

    public function down(): void
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn(['permit_number', 'dti_issued', 'pos_sn', 'min_number']);
        });
    }
};

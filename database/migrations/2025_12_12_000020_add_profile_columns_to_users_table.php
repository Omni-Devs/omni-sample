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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('image');
            }
            if (!Schema::hasColumn('users', 'biometric_number')) {
                $table->string('biometric_number')->nullable()->after('avatar');
            }
            if (!Schema::hasColumn('users', 'id_number')) {
                $table->string('id_number')->nullable()->after('biometric_number');
            }
            if (!Schema::hasColumn('users', 'tin')) {
                $table->string('tin')->nullable()->after('id_number');
            }
            if (!Schema::hasColumn('users', 'sss_number')) {
                $table->string('sss_number')->nullable()->after('tin');
            }
            if (!Schema::hasColumn('users', 'phil_health_number')) {
                $table->string('phil_health_number')->nullable()->after('sss_number');
            }
            if (!Schema::hasColumn('users', 'pag_ibig_number')) {
                $table->string('pag_ibig_number')->nullable()->after('phil_health_number');
            }
            if (!Schema::hasColumn('users', 'blood_type_id')) {
                $table->unsignedBigInteger('blood_type_id')->nullable()->after('pag_ibig_number');
            }
            if (!Schema::hasColumn('users', 'gender_id')) {
                $table->unsignedBigInteger('gender_id')->nullable()->after('blood_type_id');
            }
            if (!Schema::hasColumn('users', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('gender_id');
            }
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age')->nullable()->after('date_of_birth');
            }
            if (!Schema::hasColumn('users', 'civil_status_id')) {
                $table->unsignedBigInteger('civil_status_id')->nullable()->after('age');
            }
            if (!Schema::hasColumn('users', 'landline_number')) {
                $table->string('landline_number')->nullable()->after('mobile_number');
            }
            // Boolean flags
            $flags = [
                'allow_timekeeper_access',
                'allow_prf_access',
                'allow_inventory_request',
                'allow_processed_goods_logging',
                'allow_sales_report',
                'allow_fund_transfer',
                'allow_liquidation',
            ];
            foreach ($flags as $flag) {
                if (!Schema::hasColumn('users', $flag)) {
                    $table->boolean($flag)->default(false)->after('civil_status_id');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $cols = [
                'avatar', 'biometric_number', 'id_number', 'tin', 'sss_number', 'phil_health_number', 'pag_ibig_number',
                'blood_type_id', 'gender_id', 'date_of_birth', 'age', 'civil_status_id', 'landline_number',
                'allow_timekeeper_access', 'allow_prf_access', 'allow_inventory_request', 'allow_processed_goods_logging',
                'allow_sales_report', 'allow_fund_transfer', 'allow_liquidation',
            ];
            foreach ($cols as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};

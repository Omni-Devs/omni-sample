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
        // NOTE: Changing column types using ->change() requires the doctrine/dbal package.
        // Run: composer require doctrine/dbal
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'gender_id')) {
                $table->string('gender_id')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'blood_type_id')) {
                $table->string('blood_type_id')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'civil_status_id')) {
                $table->string('civil_status_id')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'gender_id')) {
                $table->unsignedBigInteger('gender_id')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'blood_type_id')) {
                $table->unsignedBigInteger('blood_type_id')->nullable()->change();
            }
            if (Schema::hasColumn('users', 'civil_status_id')) {
                $table->unsignedBigInteger('civil_status_id')->nullable()->change();
            }
        });
    }
};

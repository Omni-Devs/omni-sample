<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_work_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('hire_date')->nullable();
            $table->unsignedBigInteger('employment_status_id')->nullable();
            $table->date('regularization')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('direct_supervisor')->nullable();
            $table->decimal('monthly_rate', 12, 2)->nullable();
            $table->decimal('daily_rate', 12, 2)->nullable();
            $table->decimal('hourly_rate', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_work_informations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_time_records', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('salary_method_id')->nullable();
            $table->string('activity')->nullable(); // e.g. Time In, Time Out
            $table->time('time')->nullable();
            $table->json('time_in_reports')->nullable();
            $table->json('other_reports')->nullable();
            $table->json('time_out_reports')->nullable();
            $table->enum('status', ['rest_day','absent','late','under_time','worked'])->default('worked');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('salary_method_id')->references('id')->on('salary_methods')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_time_records');
    }
};

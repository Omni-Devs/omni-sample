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
        Schema::create('workforce_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();

            $table->time('time_start');
            $table->time('time_end');

            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();

            // Arrays
            $table->json('work_days')->nullable();   // e.g. ["Mon","Tue","Wed"]
            $table->json('rest_days')->nullable();   // e.g. ["Sun"]
            $table->json('open_time')->nullable();   // e.g. [{"day": "Mon", "start":"08:00","end":"17:00"}]

            // Status with default
            $table->enum('status', ['active', 'archived'])->default('active');

            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workforce_shifts');
    }
};

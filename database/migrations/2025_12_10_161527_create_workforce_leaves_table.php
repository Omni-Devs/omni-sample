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
        Schema::create('workforce_leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');

            // Name must be unique
            $table->string('name')->unique();

            // Notice period (integer)
            $table->integer('notice_period');

            // Remarks (nullable)
            $table->text('remarks')->nullable();

            // Status: active or archived
            $table->enum('status', ['active', 'archived'])->default('active');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workforce_leaves');
    }
};

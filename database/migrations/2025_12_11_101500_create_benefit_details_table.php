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
        Schema::create('benefit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benefit_id')->constrained('benefits')->cascadeOnDelete();
            $table->decimal('salary_rate_from', 15, 2)->default(0);
            $table->decimal('salary_rate_to', 15, 2)->default(0);
            $table->decimal('employer_share', 15, 2)->default(0);
            $table->decimal('employee_share', 15, 2)->default(0);
            $table->string('employer_share_type')->nullable();
            $table->string('employee_share_type')->nullable();
            $table->timestamps();
        });

        // If the old JSON 'details' column exists on benefits, drop it to avoid duplication.
        if (Schema::hasColumn('benefits', 'details')) {
            Schema::table('benefits', function (Blueprint $table) {
                // dropping a column may require doctrine/dbal; if unavailable this will fail at runtime.
                $table->dropColumn('details');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('benefits', function (Blueprint $table) {
            if (!Schema::hasColumn('benefits', 'details')) {
                $table->json('details')->nullable();
            }
        });

        Schema::dropIfExists('benefit_details');
    }
};

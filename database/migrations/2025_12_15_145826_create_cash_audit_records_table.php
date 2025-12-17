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
        Schema::create('cash_audit_records', function (Blueprint $table) {
            $table->id();
            // Entry date & time
            $table->dateTime('entry_datetime');

            // Reference number (TRN-xx-xxxxx format)
            $table->string('reference_no')->unique();

            // Submitted by (FK → users)
            $table->foreignId('submitted_by')
                ->constrained('users')
                ->cascadeOnDelete();

            // Total amount (array / JSON)
            $table->json('total_amount');

            // Transfer to (FK → users)
            $table->foreignId('transfer_to')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Transfer amount
            $table->decimal('transfer_amount', 15, 2)->default(0);

            // Status enum
            $table->enum('status', ['pending', 'completed'])
                ->default('completed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_audit_records');
    }
};

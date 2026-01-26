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
        Schema::create('request_leaves', function (Blueprint $table) {
            $table->id();

            // Application info
            $table->dateTime('application_datetime');

            // Employee requesting leave
            $table->foreignId('employee_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Leave type
            $table->foreignId('workforce_leave_id')
                ->constrained('workforce_leaves')
                ->cascadeOnDelete();

            // Leave period
            $table->date('period_start');
            $table->date('period_end');

            // Computed days
            $table->decimal('no_of_days', 5, 2);

            // Reason
            $table->text('reason');

            $table->enum('status', ['pending', 'approved', 'disapproved', 'cancelled'])
            ->default('pending');

            // Approval
            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('approved_datetime')->nullable();

            // Disapproval
            $table->foreignId('disapproved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('disapproved_datetime')->nullable();

            // Attachment (file path)
            $table->string('attachment')->nullable();

            $table->index(['employee_id', 'status'], 'request_leaves_employee_status_idx');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_leaves');
    }
};

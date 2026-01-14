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
        Schema::table('inventory_transfers', function (Blueprint $table) {
            // IN TRANSIT
            $table->foreignId('in_transit_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('in_transit_datetime')->nullable();

            // COMPLETED
            $table->foreignId('completed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('completed_datetime')->nullable();

            // DISAPPROVED
            $table->foreignId('disapproved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('disapproved_datetime')->nullable();

            // ARCHIVED
            $table->foreignId('archived_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('archived_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_transfers', function (Blueprint $table) {
            $table->dropForeign(['in_transit_by']);
            $table->dropForeign(['completed_by']);
            $table->dropForeign(['disapproved_by']);
            $table->dropForeign(['archived_by']);

            $table->dropColumn([
                'in_transit_by',
                'in_transit_datetime',
                'completed_by',
                'completed_datetime',
                'disapproved_by',
                'disapproved_datetime',
                'archived_by',
                'archived_datetime',
            ]);
        });
    }
};

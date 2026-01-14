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
        Schema::table('inventory_transfer_send_outs', function (Blueprint $table) {
            // user who received the items
            $table->foreignId('received_by')
                  ->nullable()
                  ->after('items_onload') // adjust if needed
                  ->constrained('users')
                  ->nullOnDelete();

            // date & time received
            $table->dateTime('received_datetime')
                  ->nullable()
                  ->after('received_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_transfer_send_outs', function (Blueprint $table) {
            $table->dropForeign(['received_by']);
            $table->dropColumn([
                'received_by',
                'received_datetime',
            ]);
        });
    }
};

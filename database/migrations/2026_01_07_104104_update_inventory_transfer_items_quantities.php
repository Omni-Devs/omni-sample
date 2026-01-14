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
        Schema::table('inventory_transfer_items', function (Blueprint $table) {
            // Rename existing column
            $table->renameColumn('quantity', 'quantity_requested');

            // Add new column
            $table->integer('quantity_sent')->default(0)->after('quantity_requested');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_transfer_items', function (Blueprint $table) {
            // Revert column name
            $table->renameColumn('quantity_requested', 'quantity');

            // Drop added column
            $table->dropColumn('quantity_sent');
        });
    }
};

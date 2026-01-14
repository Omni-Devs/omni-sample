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
            $table->decimal('quantity_requested', 10, 2)
                ->change();

            $table->decimal('quantity_sent', 10, 2)
                ->nullable()
                ->default(0)
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_transfer_items', function (Blueprint $table) {
             $table->integer('quantity_requested')
                ->change();

            $table->integer('quantity_sent')
                ->nullable()
                ->default(0)
                ->change();
        });
    }
};

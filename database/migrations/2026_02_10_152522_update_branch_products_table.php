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
        Schema::table('branch_products', function (Blueprint $table) {
            // 1️⃣ Rename onhand → quantity
            $table->renameColumn('onhand', 'quantity');
        });

        Schema::table('branch_products', function (Blueprint $table) {
            // 2️⃣ Change quantity to decimal(10,2)
            $table->decimal('quantity', 10, 2)->default(0)->change();

            // 3️⃣ Add station_id & unit_id
            $table->foreignId('station_id')
                  ->after('price')
                  ->constrained('stations')
                  ->restrictOnDelete();

            $table->foreignId('unit_id')
                  ->after('station_id')
                  ->constrained('units')
                  ->restrictOnDelete();

            // 4️⃣ Drop cost column
            $table->dropColumn('cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_products', function (Blueprint $table) {
            // Re-add cost
            $table->decimal('cost', 10, 2)->nullable();

            // Drop FKs
            $table->dropForeign(['station_id']);
            $table->dropForeign(['unit_id']);

            // Drop columns
            $table->dropColumn(['station_id', 'unit_id']);

            // Change quantity back
            $table->integer('quantity')->change();

            // Rename back
            $table->renameColumn('quantity', 'onhand');
        });
    }
};

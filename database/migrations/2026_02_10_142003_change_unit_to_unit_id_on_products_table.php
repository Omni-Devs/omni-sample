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
        Schema::table('products', function (Blueprint $table) {
             // 1️⃣ Rename column
            $table->renameColumn('unit', 'unit_id');
        });

        Schema::table('products', function (Blueprint $table) {
            // 2️⃣ Change type to foreignId
            $table->unsignedBigInteger('unit_id')->nullable()->change();

            // 3️⃣ Add foreign key constraint
            $table->foreign('unit_id')
                  ->references('id')
                  ->on('units')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
             // Drop FK first
            $table->dropForeign(['unit_id']);

            // Change back to string
            $table->string('unit_id')->change();

            // Rename back
            $table->renameColumn('unit_id', 'unit');
        });
    }
};

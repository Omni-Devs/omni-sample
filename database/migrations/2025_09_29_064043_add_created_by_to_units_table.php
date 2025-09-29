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
        Schema::table('units', function (Blueprint $table) {
            // Add created_by column (nullable so old data won’t break)
            $table->unsignedBigInteger('created_by')->nullable()->after('name');

            // Add foreign key constraint
            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                  ->onDelete('set null'); // if user is deleted, keep unit but set created_by = null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};

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

        $table->unsignedBigInteger('station_id')->nullable()->after('unit'); // Adjust position as needed

        // Add foreign key only if it does not already exist
            $table->foreign('station_id')
                  ->references('id')
                  ->on('stations')
                  ->onDelete('cascade'); // optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['station_id']);
                $table->dropColumn('station_id');
        });
    }
};

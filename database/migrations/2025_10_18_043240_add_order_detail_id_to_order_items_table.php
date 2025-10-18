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
        Schema::table('order_items', function (Blueprint $table) {
            // Add the new foreign key column
            if (!Schema::hasColumn('order_items', 'order_detail_id')) {
                $table->unsignedBigInteger('order_detail_id')->after('id');
                $table->foreign('order_detail_id')
                      ->references('id')
                      ->on('order_details')
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Rollback: remove the column and its foreign key
            if (Schema::hasColumn('order_items', 'order_detail_id')) {
                $table->dropForeign(['order_detail_id']);
                $table->dropColumn('order_detail_id');
            }
        });
    }
};

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
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('archived_by')->nullable()->after('approved_at');
            $table->timestamp('archived_at')->nullable()->after('archived_by');

            // Foreign key relationship to users table
            $table->foreign('archived_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_purchase_orders', function (Blueprint $table) {
            $table->dropForeign(['archived_by']);
            $table->dropColumn(['archived_by', 'archived_at']);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inventory_audit_items', function (Blueprint $table) {
            if (!Schema::hasColumn('inventory_audit_items', 'component_id')) {
                $table->unsignedBigInteger('component_id')->nullable()->after('product_id');
                $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            }

            // Make product_id nullable as well
            $table->unsignedBigInteger('product_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('inventory_audit_items', function (Blueprint $table) {
            if (Schema::hasColumn('inventory_audit_items', 'component_id')) {
                $table->dropForeign(['component_id']);
                $table->dropColumn('component_id');
            }

            // Optionally revert product_id to NOT NULL
            $table->unsignedBigInteger('product_id')->nullable(false)->change();
        });
    }
};

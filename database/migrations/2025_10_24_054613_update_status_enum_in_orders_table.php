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
        Schema::table('orders', function (Blueprint $table) {
            // Drop old status column
            $table->dropColumn('status');
        });

        Schema::table('orders', function (Blueprint $table) {
            // Add new status column with additional values
            $table->enum('status', ['walked','served','serving','billout','payments','closed','cancelled',])->default('serving');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the new status column
            $table->dropColumn('status');
        });

        Schema::table('orders', function (Blueprint $table) {
            // Re-add the old version
            $table->enum('status', ['serving', 'billout', 'payments', 'closed', 'cancelled'])
                    ->default('serving');
        });
    }
};

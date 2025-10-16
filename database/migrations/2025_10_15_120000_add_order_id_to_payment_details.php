<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('payment_details')) {
            return;
        }

        Schema::table('payment_details', function (Blueprint $table) {
            if (!Schema::hasColumn('payment_details', 'order_id')) {
                $table->unsignedBigInteger('order_id')->nullable()->after('id')->index();
                // if orders table exists, add foreign key
                if (Schema::hasTable('orders')) {
                    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('payment_details')) {
            return;
        }

        Schema::table('payment_details', function (Blueprint $table) {
            if (Schema::hasColumn('payment_details', 'order_id')) {
                // drop foreign first if exists
                try {
                    $table->dropForeign(['order_id']);
                } catch (\Exception $e) {
                    // ignore if foreign doesn't exist
                }
                $table->dropColumn('order_id');
            }
        });
    }
};

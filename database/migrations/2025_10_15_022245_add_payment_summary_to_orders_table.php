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
            Schema::table('orders', function (Blueprint $table) {
                $table->decimal('total_payment_rendered', 10, 2)
                    ->default(0)
                    ->after('total_charge');
                $table->decimal('change_amount', 10, 2)
                    ->default(0)
                    ->after('total_payment_rendered');
            });
        }

        public function down(): void
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn(['total_payment_rendered', 'change_amount']);
            });
        }
};

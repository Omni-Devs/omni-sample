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
        Schema::table('payment_details', function (Blueprint $table) {
            $table->decimal('total_rendered', 10, 2)->default(0)->after('amount_paid');
            $table->decimal('change_amount', 10, 2)->default(0)->after('total_rendered');
        });
    }

    public function down(): void
    {
        Schema::table('payment_details', function (Blueprint $table) {
            $table->dropColumn(['total_rendered', 'change_amount']);
        });
    }
};

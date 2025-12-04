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
        Schema::table('account_payable_details', function (Blueprint $table) {
            $table->decimal('amount_to_pay', 15, 2)->default(0)->after('total_amount');
        });
    }

    public function down(): void
    {
        Schema::table('account_payable_details', function (Blueprint $table) {
            $table->dropColumn('amount_to_pay');
        });
    }
};

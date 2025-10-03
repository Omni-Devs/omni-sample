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
            $table->decimal('gross_amount', 10, 2)->default(0)->after('number_pax');   // gross charge before discount
            $table->decimal('sr_pwd_discount', 10, 2)->default(0)->after('gross_amount'); 
            $table->decimal('other_discounts', 10, 2)->default(0)->after('sr_pwd_discount'); 
            $table->decimal('net_amount', 10, 2)->default(0)->after('other_discounts'); // net bill after discounts
            $table->decimal('vatable', 10, 2)->default(0)->after('net_amount');
            $table->decimal('vat_12', 10, 2)->default(0)->after('vatable');
            $table->decimal('non_taxable', 10, 2)->default(0)->after('vat_12');
            $table->decimal('total_charge', 10, 2)->default(0)->after('non_taxable');  // final payable amount
            $table->decimal('discount_total', 10, 2)->default(0)->after('total_charge'); // sum of all discounts
            $table->text('charges_description')->nullable()->after('discount_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'gross_amount',
                'sr_pwd_discount',
                'other_discounts',
                'net_amount',
                'vatable',
                'vat_12',
                'non_taxable',
                'total_charge',
                'discount_total',
                'charges_description',
            ]);
        });
    }
};
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
        Schema::table('accounting_categories', function (Blueprint $table) {

            // Remove ENUMs and convert to string
            $table->string('category_payable')->nullable()->change();
            $table->string('category_receivable')->nullable()->change();

            // Remove old "type"
            if (Schema::hasColumn('accounting_categories', 'type')) {
                $table->dropColumn('type');
            }

            // Add new type columns
            $table->string('type_payable')->nullable();
            $table->string('type_receivable')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('accounting_categories', function (Blueprint $table) {

            // Convert back (if needed)
            $table->enum('category_payable', [
                'expenses','assets','sales','payroll','purchase_order','non_sales'
            ])->nullable()->change();

            $table->enum('category_receivable', [
                'output_taxes','input_taxes','sales','payroll','non_sales'
            ])->nullable()->change();

            // Restore old type column
            $table->string('type')->nullable();

            // Drop new type columns
            $table->dropColumn('type_payable');
            $table->dropColumn('type_receivable');
        });
    }
};

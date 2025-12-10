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
        Schema::table('cash_audits', function (Blueprint $table) {
        /*
            |--------------------------------------------------------------------------
            | REMOVE STATIC PAYMENT COLUMNS
            |--------------------------------------------------------------------------
            */
            $columnsToDrop = [
                'cash_sales',
                'gcash_sales',
                'bdo_sales',
                'bpi_sales',
                'other'
            ];

            foreach ($columnsToDrop as $col) {
                if (Schema::hasColumn('cash_audits', $col)) {
                    $table->dropColumn($col);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | RENAME receivable_bpi → receivable
            |--------------------------------------------------------------------------
            */
            if (Schema::hasColumn('cash_audits', 'receivable_bpi')) {
                $table->renameColumn('receivable_bpi', 'receivable');
            }

            /*
            |--------------------------------------------------------------------------
            | COMBINE transaction_date + transaction_time → transaction_datetime
            |--------------------------------------------------------------------------
            */
            if (
                Schema::hasColumn('cash_audits', 'transaction_date') &&
                Schema::hasColumn('cash_audits', 'transaction_time')
            ) {
                // Add new datetime field
                $table->dateTime('transaction_datetime')
                      ->nullable()
                      ->after('terminal_no');

                // Remove old columns
                $table->dropColumn('transaction_date');
                $table->dropColumn('transaction_time');
            }

            /*
            |--------------------------------------------------------------------------
            | DROP OLD total_sales BEFORE ADDING NEW ONE
            |--------------------------------------------------------------------------
            */
            if (Schema::hasColumn('cash_audits', 'total_sales')) {
                $table->dropColumn('total_sales');
            }

            /*
            |--------------------------------------------------------------------------
            | ADD payment_breakdown JSON + NEW total_sales
            |--------------------------------------------------------------------------
            */
            $table->json('payment_breakdown')->nullable()->after('starting_fund');
            $table->decimal('total_sales', 12, 2)->default(0)->after('payment_breakdown');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_audits', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | DROP NEW COLUMNS
            |--------------------------------------------------------------------------
            */
            if (Schema::hasColumn('cash_audits', 'payment_breakdown')) {
                $table->dropColumn('payment_breakdown');
            }

            if (Schema::hasColumn('cash_audits', 'total_sales')) {
                $table->dropColumn('total_sales');
            }

            if (Schema::hasColumn('cash_audits', 'transaction_datetime')) {
                $table->dropColumn('transaction_datetime');
            }

            /*
            |--------------------------------------------------------------------------
            | RESTORE OLD transaction_date + transaction_time
            |--------------------------------------------------------------------------
            */
            $table->date('transaction_date')->nullable();
            $table->time('transaction_time')->nullable();

            /*
            |--------------------------------------------------------------------------
            | RESTORE STATIC PAYMENT COLUMNS
            |--------------------------------------------------------------------------
            */
            $table->decimal('cash_sales', 12, 2)->nullable();
            $table->decimal('gcash_sales', 12, 2)->nullable();
            $table->decimal('bdo_sales', 12, 2)->nullable();
            $table->decimal('bpi_sales', 12, 2)->nullable();
            $table->decimal('other', 12, 2)->nullable();

            // Restore original total_sales
            $table->decimal('total_sales', 12, 2)->nullable();

            /*
            |--------------------------------------------------------------------------
            | RENAME receivable → receivable_bpi
            |--------------------------------------------------------------------------
            */
            if (Schema::hasColumn('cash_audits', 'receivable')) {
                $table->renameColumn('receivable', 'receivable_bpi');
            }
        });
    }
};

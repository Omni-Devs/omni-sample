<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add new columns if they don't already exist
        Schema::table('user_leaves', function (Blueprint $table) {
            if (!Schema::hasColumn('user_leaves', 'assigned_days')) {
                $table->unsignedInteger('assigned_days')->default(0)->after('leave_id');
            }
            if (!Schema::hasColumn('user_leaves', 'earn')) {
                $table->integer('earn')->default(0)->after('assigned_days');
            }
            if (!Schema::hasColumn('user_leaves', 'used')) {
                $table->integer('used')->default(0)->after('earn');
            }
            if (!Schema::hasColumn('user_leaves', 'balance')) {
                $table->integer('balance')->default(0)->after('used');
            }
        });

        // If there is an existing legacy `days` column, copy values into assigned_days and attempt to drop it.
        if (Schema::hasColumn('user_leaves', 'days')) {
            try {
                // Copy numeric values from days -> assigned_days
                DB::table('user_leaves')->whereNotNull('days')->update(['assigned_days' => DB::raw('days')]);
            } catch (\Throwable $e) {
                // ignore copy errors, leave values as-is
            }

            // Try to drop the old column. Note: dropping/renaming columns may require doctrine/dbal.
            try {
                Schema::table('user_leaves', function (Blueprint $table) {
                    $table->dropColumn('days');
                });
            } catch (\Throwable $e) {
                // If dropColumn failed (lack of dbal), try rename (which also may require dbal).
                try {
                    Schema::table('user_leaves', function (Blueprint $table) {
                        $table->renameColumn('days', 'assigned_days');
                    });
                } catch (\Throwable $_) {
                    // As a last resort leave both columns in place (assigned_days has been created and populated).
                }
            }
        }

        // Ensure balance is populated sensibly where it is still zero
        try {
            DB::table('user_leaves')->where('balance', 0)->update(['balance' => DB::raw('assigned_days + earn - used')]);
        } catch (\Throwable $_) {
            // ignore if DB engine doesn't support the expression
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Attempt to restore previous state: if days doesn't exist but assigned_days does
        // try to rename assigned_days back to days. Then drop the added tracking columns.
        if (Schema::hasColumn('user_leaves', 'assigned_days') && !Schema::hasColumn('user_leaves', 'days')) {
            try {
                Schema::table('user_leaves', function (Blueprint $table) {
                    $table->renameColumn('assigned_days', 'days');
                });
            } catch (\Throwable $_) {
                // If rename not possible, create days and copy values
                try {
                    if (!Schema::hasColumn('user_leaves', 'days')) {
                        Schema::table('user_leaves', function (Blueprint $table) {
                            $table->unsignedInteger('days')->default(0)->after('leave_id');
                        });
                    }
                    DB::table('user_leaves')->update(['days' => DB::raw('assigned_days')]);
                } catch (\Throwable $__) {
                    // ignore failures
                }
            }
        }

        Schema::table('user_leaves', function (Blueprint $table) {
            if (Schema::hasColumn('user_leaves', 'earn')) {
                try { $table->dropColumn('earn'); } catch (\Throwable $_) {}
            }
            if (Schema::hasColumn('user_leaves', 'used')) {
                try { $table->dropColumn('used'); } catch (\Throwable $_) {}
            }
            if (Schema::hasColumn('user_leaves', 'balance')) {
                try { $table->dropColumn('balance'); } catch (\Throwable $_) {}
            }
            // If assigned_days still exists and we previously couldn't rename it back, drop it to fully revert.
            if (Schema::hasColumn('user_leaves', 'assigned_days')) {
                try { $table->dropColumn('assigned_days'); } catch (\Throwable $_) {}
            }
        });
    }
};

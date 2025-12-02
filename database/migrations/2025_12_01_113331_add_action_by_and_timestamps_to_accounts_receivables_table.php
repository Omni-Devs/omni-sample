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
        Schema::table('accounts_receivables', function (Blueprint $table) {
            // Who did it
            $table->unsignedBigInteger('approved_by')->nullable()->after('status');
            $table->unsignedBigInteger('completed_by')->nullable()->after('approved_by');
            $table->unsignedBigInteger('disapproved_by')->nullable()->after('completed_by');
            $table->unsignedBigInteger('archived_by')->nullable()->after('disapproved_by');

            // When it happened
            $table->timestamp('approved_at')->nullable()->after('archived_by');
            $table->timestamp('completed_at')->nullable()->after('approved_at');
            $table->timestamp('disapproved_at')->nullable()->after('completed_at');
            $table->timestamp('archived_at')->nullable()->after('disapproved_at');

            // Foreign keys (optional but recommended)
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('completed_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('disapproved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('archived_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('accounts_receivables', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['completed_by']);
            $table->dropForeign(['disapproved_by']);
            $table->dropForeign(['archived_by']);

            $table->dropColumn([
                'approved_by', 'approved_at',
                'completed_by', 'completed_at',
                'disapproved_by', 'disapproved_at',
                'archived_by', 'archived_at'
            ]);
        });
    }
};

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
        Schema::table('request_leaves', function (Blueprint $table) {
            // Drop old column if exists
            if (Schema::hasColumn('request_leaves', 'attachment')) {
                $table->dropColumn('attachment');
            }

            // Add new JSON column
            $table->json('attachments')->nullable()->after('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('request_leaves', function (Blueprint $table) {
            $table->dropColumn('attachments');
            $table->string('attachment')->nullable();
        });
    }
};

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
        Schema::table('po_details', function (Blueprint $table) {
            $table->decimal('tax', 10, 2)->default(0)->after('sub_total');
        });
    }

    /*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Drops the tax column from the po_details table.
     */
    /*******  7de9829c-a0d4-4e04-b972-75dcbae044e0  *******/
    public function down(): void
    {
        Schema::table('po_details', function (Blueprint $table) {
            $table->dropColumn('tax');
        });
    }

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            if (!Schema::hasColumn('salary_methods', 'shift_id')) {
                $table->foreignId('shift_id')->nullable()->constrained('workforce_shifts')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('salary_methods', function (Blueprint $table) {
            if (Schema::hasColumn('salary_methods', 'shift_id')) {
                $table->dropConstrainedForeignId('shift_id');
            }
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            // 1. Check and drop foreign key if exists
            $foreignKeys = DB::select("
                SELECT CONSTRAINT_NAME 
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
                WHERE TABLE_SCHEMA = DATABASE()
                  AND TABLE_NAME = 'educational_backgrounds' 
                  AND COLUMN_NAME = 'level_id' 
                  AND REFERENCED_TABLE_NAME IS NOT NULL
            ");

            if (!empty($foreignKeys)) {
                $constraintName = $foreignKeys[0]->CONSTRAINT_NAME;
                $table->dropForeign($constraintName);
            }

            // 2. Drop index if exists
            $indexes = DB::select("
                SHOW INDEXES FROM educational_backgrounds 
                WHERE Column_name = 'level_id'
            ");

            if (!empty($indexes)) {
                $table->dropIndex(['level_id']);
            }

            // 3. Rename and convert to string
            $table->renameColumn('level_id', 'level');
            $table->string('level', 50)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->renameColumn('level', 'level_id');
            $table->unsignedBigInteger('level_id')->nullable()->change();
        });
    }
};
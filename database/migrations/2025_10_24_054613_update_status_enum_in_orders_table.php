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
        DB::statement("
            ALTER TABLE orders 
            MODIFY COLUMN status ENUM('serving', 'served', 'walked', 'cancelled') 
            DEFAULT 'serving'
        ");
    }

    public function down(): void
    {
        // Rollback to previous enum (without 'walked')
        DB::statement("
            ALTER TABLE orders 
            MODIFY COLUMN status ENUM('serving', 'served', 'cancelled') 
            DEFAULT 'serving'
        ");
    }
};

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
        Schema::create('pos_session_summaries', function (Blueprint $table) {
            $table->id();

            // 🔗 Link to session
            $table->foreignId('session_id')
                  ->constrained('pos_sessions')
                  ->onDelete('cascade');

            // 💵 Financial summary fields
            $table->decimal('cash_sales', 12, 2)->default(0.00);
            $table->decimal('charge_sales', 12, 2)->default(0.00);
            $table->decimal('cash_out', 12, 2)->default(0.00);
            $table->decimal('short_over', 12, 2)->default(0.00);
            $table->decimal('tip', 12, 2)->default(0.00);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_session_summaries');
    }
};

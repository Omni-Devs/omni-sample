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
        Schema::create('pos_sessions', function (Blueprint $table) {
            $table->id();

            // 🔗 References
            $table->foreignId('branch_id')
                  ->constrained('branches')
                  ->onDelete('cascade');

            $table->foreignId('cashier_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // 🕐 Session info
            $table->string('terminal_no')->nullable();
            $table->date('transaction_date');
            $table->time('transaction_time');
            $table->decimal('cash_fund', 10, 2)->default(0.00);

            // 🏁 Status tracking
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->dateTime('closed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_sessions');
    }
};

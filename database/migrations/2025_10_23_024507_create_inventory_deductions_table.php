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
        Schema::create('inventory_deductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // 🔗 Foreign keys
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('order_detail_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            // 📉 Deduction info
            $table->decimal('quantity_deducted', 10, 3);
            $table->decimal('prev_quantity', 10, 3);
            $table->decimal('new_quantity', 10, 3);

            // ⚙️ Only two types of deductions
            $table->enum('deduction_type', ['served', 'waste']);

            // 🗒️ Notes or remarks
            $table->string('notes')->nullable();

            $table->timestamps();

            // 🧩 Foreign key constraints
            $table->foreign('component_id')
                ->references('id')
                ->on('components')
                ->onDelete('cascade');

            $table->foreign('order_detail_id')
                ->references('id')
                ->on('order_details')
                ->onDelete('set null');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_deductions');
    }
};

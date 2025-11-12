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
        Schema::create('inventory_audits', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->unique();
            $table->foreignId('audited_by')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['products', 'components', 'consumables', 'assets'])->default('products');
            $table->timestamp('entry_datetime')->nullable(); // Date and time of entry
            $table->timestamp('audit_datetime')->nullable(); // Date and time of actual audit
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_audits');
    }
};

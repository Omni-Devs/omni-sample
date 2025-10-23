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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_no')->unique();
            $table->string('customer_name');
            $table->string('company_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('landline_no')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('assigned_personnel')->nullable();
            $table->string('province')->nullable();
            $table->string('city_municipality')->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->integer('payment_terms_days')->nullable();
            $table->string('customer_type')->nullable();
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

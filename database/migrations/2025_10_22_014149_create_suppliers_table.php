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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_no')->unique();
            $table->string('fullname');
            $table->string('mobile_no')->nullable();
            $table->string('landline_no')->nullable();
            $table->string('email')->nullable();
            $table->date('supplier_since')->nullable();
            $table->string('company')->nullable();
            $table->string('tin')->nullable();
            $table->string('supplier_type')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};

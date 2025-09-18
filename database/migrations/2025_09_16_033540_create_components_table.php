<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id('id'); // COMP_ID
            $table->string('name');
            $table->string('code')->unique();
            $table->decimal('cost', 10, 2);
            $table->decimal('price', 10, 2);
            $table->string('unit');
            $table->integer('onhand')->default(0);
            $table->string('image')->nullable(); 
            $table->boolean('for_sale')->default(false);
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};

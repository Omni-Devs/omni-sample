<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('account_payables', function (Blueprint $table) {
            $table->id();

            $table->string('reference_number')->unique();

            $table->string('payor_details')->nullable();
            $table->string('payer_name')->nullable();
            $table->string('payer_company')->nullable();
            $table->string('payer_address')->nullable();
            $table->string('payer_mobile_number')->nullable();
            $table->string('payer_email_address')->nullable();
            $table->string('payer_tin')->nullable();

            $table->date('due_date')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'completed',
                'disapproved',
                'archived'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_payables');
    }
};

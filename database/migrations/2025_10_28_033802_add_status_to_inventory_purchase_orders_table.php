<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up() {
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


$table->unsignedBigInteger('accounting_category_id');
$table->foreign('accounting_category_id')->references('id')->on('accounting_categories');


$table->text('description')->nullable();
$table->integer('quantity')->default(1);
$table->decimal('tax', 10, 2)->default(0);
$table->decimal('amount_per_unit', 12, 2)->default(0);
$table->decimal('total_amount', 14, 2)->default(0);

$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('account_payables');
}
};

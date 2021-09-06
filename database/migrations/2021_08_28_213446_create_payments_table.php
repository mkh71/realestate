<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('payer_email');
            $table->float('amount', 10, 2);
            $table->string('method');
            $table->unsignedInteger('service_id')->nullable()->comment('this is for detect the purpose of payment through ID');
            $table->string('service_model')->nullable()->comment('this is for detect the model of service type ID');
            $table->string('currency')->default('usd');
            $table->string('payment_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

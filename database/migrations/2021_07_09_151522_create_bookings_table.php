<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('for')->comment('0 for Rent; 1 for Buy, 2 for short rant');
            $table->mediumText('message')->nullable();
            $table->mediumText('admin_note')->nullable();
            $table->date('date')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment("0 for processing, 1 for accept, 2 for complete, 3 for denied");
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}

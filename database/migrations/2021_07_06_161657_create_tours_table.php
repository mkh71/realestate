<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->text('name');
            $table->text('email');
            $table->text('mobile');
            $table->dateTime('schedule');
            $table->mediumText('message')->nullable();
            $table->mediumText('admin_note')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0 for processing, 1 for accept, 2 for complete, 3 for deny');
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}

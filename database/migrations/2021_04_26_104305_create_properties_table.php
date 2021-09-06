<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('home_type_id');
            $table->unsignedBigInteger('user_packages_id')->nullable();
            $table->string('title');
            $table->string('address');
            $table->longText('description')->nullable();
            $table->string('size');
            $table->unsignedInteger('price');
            $table->string('cover_image')->nullable();
            $table->mediumInteger('user_view')->default(0);
            $table->boolean('for')->default(0)->comment('0 for Long rent, 1 for Sell');
            $table->unsignedTinyInteger('bedroom');
            $table->unsignedTinyInteger('bathroom');
            $table->date('available_from')->nullable();
            $table->dateTime('advertising_close')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('area')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('country')->nullable();
            $table->text('street')->nullable();
            $table->text('lat')->nullable();
            $table->text('long')->nullable();
            $table->text('seo_keyword')->nullable();

            $table->unsignedTinyInteger('status')->default(0)->comment("0 for processing, 1 for active, 2 for booked, 3 for denied, 4 for released, 5 for Hold/SoftDelete");
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('home_type_id')->references('id')->on('home_types')->onDelete('cascade');
            $table->foreign('user_packages_id')->references('id')->on('user_packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

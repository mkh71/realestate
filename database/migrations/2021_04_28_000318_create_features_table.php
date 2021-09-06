<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->year('built_year')->nullable();
            $table->unsignedTinyInteger('mortgage_term')->nullable();
            $table->unsignedInteger('tax')->nullable();
            $table->unsignedInteger('insurance')->nullable();
            $table->unsignedInteger('hoa_fee')->nullable();
            $table->float('interest_rate', 8,2)->nullable();
            $table->unsignedTinyInteger('livable_room')->nullable();
            $table->unsignedTinyInteger('balcony')->nullable();
            $table->unsignedTinyInteger('level')->nullable();
            $table->unsignedTinyInteger('total_unit')->nullable();
            $table->unsignedTinyInteger('unit_per_level')->nullable();

            $table->string('lot')->nullable();
            $table->string('heating')->nullable();
            $table->string('cooling')->nullable();
            $table->string('parking')->nullable();
            $table->string('total_parking_space')->nullable();
            $table->mediumText('construction_materials')->nullable();
            $table->string('flooring')->nullable();
            $table->string('roof')->nullable();
            $table->string('fireplace')->nullable();
            $table->string('spa')->nullable();
            $table->string('water')->nullable();
            $table->string('outdoor_feature')->nullable();
            $table->string('scenery_view')->nullable();
            $table->string('allowed_pet')->nullable();
            $table->string('other_feature')->nullable();

            $table->boolean('dining')->nullable();
            $table->boolean('drawing')->nullable();
            $table->boolean('basement')->nullable();
            $table->boolean('public_gasline')->nullable();
            $table->boolean('public_waterline')->nullable();
            $table->boolean('furnished')->nullable();
            $table->boolean('swimming_pool')->nullable();
            $table->boolean('outdoor_shower')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('ac')->nullable();
            $table->boolean('tv_cable')->nullable();
            $table->boolean('laundry')->nullable();
            $table->boolean('gym')->nullable();
            $table->boolean('front_yard')->nullable();
            $table->boolean('private_space')->nullable();
            $table->boolean('lawn')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('wine_cellar')->nullable();
            $table->boolean('pet_allow')->nullable();
            $table->boolean('refrigerator')->nullable();
            $table->boolean('dishwasher')->nullable();
            $table->boolean('dryer')->nullable();
            $table->boolean('microwave')->nullable();
            $table->boolean('washer')->nullable();
            $table->boolean('barbeque')->nullable();
            $table->boolean('window_covering')->nullable();
            $table->string('other_appliance')->nullable();

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
        Schema::dropIfExists('features');
    }
}

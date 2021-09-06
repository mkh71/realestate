<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
            /*$table->unsignedBigInteger('development_id');
            $table->unsignedBigInteger('maintenance_id');
            $table->integer('imageable_id');
            $table->string('imageable_type');

            $table->foreign('development_id')->references('id')->on('developments')->onDelete('cascade');
            $table->foreign('maintenance_id')->references('id')->on('maintenances')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_images');
    }
}

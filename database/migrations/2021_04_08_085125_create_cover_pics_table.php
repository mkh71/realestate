<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_pics', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });
        \App\CoverPic::query()->create([
            'type' => 'Home Cover'
        ]);
        \App\CoverPic::query()->create([
            'type' => 'Service Cover'
        ]);
        \App\CoverPic::query()->create([
            'type' => 'Contact Cover'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cover_pics');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type')->default('user');
            $table->string('phone')->unique()->nullable();
            $table->string('phone2')->unique()->nullable();
            $table->boolean('isBuyer')->default(0);
            $table->boolean('isRenter')->default(0);
            $table->boolean('isVerified')->default(0);
            $table->string('region')->nullable();
            $table->string('image')->nullable();
            $table->string('nid')->nullable();
            $table->longText('details')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('skype')->nullable();
            $table->string('instagram')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        \App\User::query()->create([
            'name'=>'Abar Real Estate',
            'type'=>'admin',
            'phone'=>'+44 7534 716534',
            'email'=>'admin@gmail.com',
            'image'=>'',
            'password'=>bcrypt(123123),
            'isVerified'=>1,
            'status'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

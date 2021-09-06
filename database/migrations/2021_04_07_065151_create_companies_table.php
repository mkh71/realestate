<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone1')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->longText('about')->nullable();
            $table->longText('about_footer')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('mobile_logo')->nullable();
            $table->string('footer_logo')->nullable();

            $table->longText('privacy_policy')->nullable();
            $table->longText('terms_condition')->nullable();
            $table->timestamps();
        });
        \App\Company::query()->create([
            'name'=>'Abar Real Estate',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

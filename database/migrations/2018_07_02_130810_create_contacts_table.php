<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('worktime', 190);
            $table->string('address_ru', 190);
            $table->string('address_uz', 190);
            $table->string('near_uz', 190);
            $table->string('near_ru', 190);
            $table->string('tel', 190);
            $table->string('email', 190); 
            $table->string('map', 190);
            $table->string('face', 190);
            $table->string('twit', 190);
            $table->string('ins', 190);
            $table->string('tele', 190);
            $table->string('ok', 190);
            $table->string('vk', 190);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}

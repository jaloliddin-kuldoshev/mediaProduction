<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_uz', 190);
            $table->string('title_ru', 190);
            $table->text('text_ru');
            $table->text('text_uz');
            $table->string('slug', 190)->unique();
            $table->integer('show_on_main')->default(1);
            $table->integer('clients_id')->unsigned()->index();
            $table->integer('services_id')->unsigned()->index();
            $table->integer('categories_id')->unsigned()->index();
            // $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
            // $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('portfolios');
    }
}

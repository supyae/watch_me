<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movie_name');
            $table->string('actor');
            $table->string('director');
            $table->string('producer');
            $table->integer('genre_id');
            $table->string('description');
            $table->string('movie_img');
            $table->string('trailer');
            $table->string('release_date');
            $table->string('bookopen_date');
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
        Schema::drop('movie');
    }
}

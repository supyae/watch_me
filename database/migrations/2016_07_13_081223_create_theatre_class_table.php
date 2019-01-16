<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatreClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatre_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theatre_id');
            $table->string('class_name');
            $table->integer('price_per_row');
            $table->integer('floor');
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
        Schema::drop('theatre_class');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theatre_name');
            $table->integer('township_id');
            $table->string('address');
            $table->string('theatre_img');
            $table->integer('total_seat');
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
        Schema::drop('theatre');
    }
}

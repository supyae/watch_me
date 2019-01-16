<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seater', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id');
            $table->integer('available_id');
            $table->integer('booking_id');
            $table->string('seat_no');
            $table->string('price');
            $table->integer('pending_status');
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
        Schema::drop('seater');
    }
}

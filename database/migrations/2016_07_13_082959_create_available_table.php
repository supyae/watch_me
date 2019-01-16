<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id');
            $table->integer('timetable_id');
            $table->string('show_date');
            $table->integer('available_seat');
            $table->integer('sold');
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
        Schema::drop('available');
    }
}

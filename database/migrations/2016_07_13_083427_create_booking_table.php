<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id');
            $table->integer('available_id');
            $table->string('booking_date');
            $table->integer('customer_id');
            $table->string('ticket_no');
            $table->integer('total_seat');
            $table->string('total_amount');
            $table->string('discount_amount');
            $table->string('amount');
            $table->string('status');
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
        Schema::drop('booking');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMapColumnTheatre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theatre', function (Blueprint $table) {
            $table->string('maps', 500)->after('theatre_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theatre', function (Blueprint $table) {
            //
        });
    }
}

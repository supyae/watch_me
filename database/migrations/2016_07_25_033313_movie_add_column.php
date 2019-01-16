<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie', function (Blueprint $table) {
            //$table->addColumn('string','duration')->after('trailer');
            $table->string('duration')->after('trailer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie', function (Blueprint $table) {
            //
        });
    }
}

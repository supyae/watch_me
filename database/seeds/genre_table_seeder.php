<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genre_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = array('Horror', 'Action', 'Drama');

        foreach ($city as $c) {
            DB::table('genre')->insert([

                'name' => $c
            ]);
        }
    }
}

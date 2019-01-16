<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class city_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = array(
            [
            'name' => 'Mandalay',
            'zip_code' => '11'],
            [
                'name' => 'Yangon',
                'zip_code' => '22'
            ]
        );

        foreach ($city as $c) {
            DB::table('city')->insert([

                'name' => $c['name'],
                'zip_code' => $c['zip_code']
            ]);
        }


    }
}

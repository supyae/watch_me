<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class township_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Hleden',
                'city_id' => 1
            ], [
                'name' => 'Sule',
                'city_id' => 1

            ], [
                'name' => 'Bahan',
                'city_id' => 1

            ], [
                'name' => 'Tarmwe',
                'city_id' => 1

            ], [
                'name' => 'Yinkin',
                'city_id' => 1

            ], [
                'name' => 'Sanchaung',
                'city_id' => 1

            ], [
                'name' => 'North Okkala',
                'city_id' => 1

            ], [
                'name' => 'South Okkala',
                'city_id' => 1

            ], [
                'name' => 'North Dagon',
                'city_id' => 1

            ], [
                'name' => 'South Dagon',
                'city_id' => 1

            ], [
                'name' => 'Tarkayta',
                'city_id' => 1

            ], [
                'name' => 'Kamayut',
                'city_id' => 1

            ],
        );

        foreach ($data as $d) {
            DB::table('township')->insert([

                'name' => $d['name'],
                'city_id' => $d['city_id']
            ]);
        }
    }
}

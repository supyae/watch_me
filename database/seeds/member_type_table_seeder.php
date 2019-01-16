<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class member_type_table_seeder extends Seeder
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
                'name' => 'Classic',
                'points' => '30000'],
            [
                'name' => 'Silver',
                'points' => '50000'
            ],
            [
                'name' => 'Gold',
                'points' => '100000'
            ]

        );

        foreach ($data as $d) {
            DB::table('member_type')->insert([

                'name' => $d['name'],
                'points' => $d['points']
            ]);
        }
    }
}

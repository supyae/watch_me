<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usertype_table_seeder extends Seeder
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
                'name' => 'Super'],
            [
                'name' => 'Normal'
            ]

        );

        foreach ($data as $d) {
            DB::table('user_type')->insert([
                'name' => $d['name'],
            ]);
        }
    }
}

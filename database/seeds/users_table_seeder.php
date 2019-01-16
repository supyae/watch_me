<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Su Pyae',
            'email' => 'supyaethandar@yahoo.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '0942001234',
            'user_type_id' => 1,
            'theatre_id' => 1,
            'status' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@yahoo.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '0942001234',
            'user_type_id' => 1,
            'theatre_id' => 1,
            'status' => 1
        ]);
    }
}

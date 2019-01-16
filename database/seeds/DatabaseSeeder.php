<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(city_table_seeder::class);
        $this->call(genre_table_seeder::class);
        $this->call(member_type_table_seeder::class);
        $this->call(township_table_seeder::class);
        $this->call(users_table_seeder::class);
        $this->call(usertype_table_seeder::class);
    }
}

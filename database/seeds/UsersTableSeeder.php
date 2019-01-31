<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sam Slosser',
            'email' => 'samuel.slosser@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hans Gruber',
            'email' => 'test@null.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tyler Brown',
            'email' => 'brown.tc7@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

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
            //'id' => 0,
            'name' =>'Admin',
            'email' => 'Admin@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Administrator',
            'status'=>'N/A'
        ]);
        DB::table('users')->insert([
            //'id' => 1,
            'name' =>'Chris',
            'email' => 'Chris@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Curator',
            'status'=>'Approved'
        ]);
        DB::table('users')->insert([
            //'id' => 2,
            'name' =>'Chloe',
            'email' => 'Chloe@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Curator',
            'status'=>'Waiting for approval'
        ]);
        DB::table('users')->insert([
            //'id' => 3,
            'name' =>'Cara',
            'email' => 'Cara@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Curator',
            'status'=>'Waiting for approval'
        ]);
        DB::table('users')->insert([
            //'id' => 4,
            'name' =>'Bob',
            'email' => 'Bob@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Member',
            'status'=>'N/A'
        ]);
        DB::table('users')->insert([
            //'id' => 5,
            'name' =>'Fred',
            'email' => 'Fred@a.org',
            'password' => bcrypt('1234'),
            'role'=> 'Member',
            'status'=>'N/A'
        ]);
    }
}

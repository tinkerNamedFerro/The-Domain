<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'id' => 0,
            'first_name' =>'Jeff',
            'last_name' => 'Hawkins',
            'date_of_birth' => '06/01/1957',
            'nationality'=> 'american',
        ]);
    }
}
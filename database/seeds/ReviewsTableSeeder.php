<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'id' => 0,
            'users_id' => 0,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
        DB::table('reviews')->insert([
            'id' => 1,
            'users_id' => 1,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
        DB::table('reviews')->insert([
            'id' => 2,
            'users_id' => 2,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
        DB::table('reviews')->insert([
            'id' => 3,
            'users_id' => 3,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
        DB::table('reviews')->insert([
            'id' => 4,
            'users_id' => 4,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
        DB::table('reviews')->insert([
            'id' => 5,
            'users_id' => 5,
            'books_id' => 0,
            'written_text' => "Howdy",
            'rating'=> '4',
        ]); 
    }
}
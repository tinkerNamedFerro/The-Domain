<?php

use Illuminate\Database\Seeder;

class AuthorsBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors_books')->insert([
            'id'=>0,
            'authors_id' => 0,
            'books_id' => 0,
        ]);
    }
}
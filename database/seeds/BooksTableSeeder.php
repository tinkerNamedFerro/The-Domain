<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id'=>0,
            'title' =>'On Intelligence',
            'genre' => 'science',
            'publication' => 2003,
            'book_cover' => "https://i.ibb.co/mNjmLmM/OnInt.png"
        ]);
    }
}
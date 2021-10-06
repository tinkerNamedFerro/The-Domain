<?php

use Illuminate\Database\Seeder;

class PrefillAuthorsBooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('authors_books')->delete();
        
        \DB::table('authors_books')->insert(array (
            0 => 
            array (
                //'id' => '0',
                'authors_id' => '0',
                'books_id' => '0',
                'created_at' => '2020-09-29 07:29:20',
                'updated_at' => '2020-09-29 07:29:20',
            ),
            1 => 
            array (
                //'id' => '1',
                'authors_id' => '1',
                'books_id' => '1',
                'created_at' => '2020-09-29 07:29:20',
                'updated_at' => '2020-09-29 07:29:20',
            ),
            2 => 
            array (
                //'id' => '2',
                'authors_id' => '2',
                'books_id' => '2',
                'created_at' => '2020-09-29 07:34:55',
                'updated_at' => '2020-09-29 07:34:55',
            ),
            3 => 
            array (
                //'id' => '12',
                'authors_id' => '5',
                'books_id' => '6',
                'created_at' => '2020-09-29 11:10:21',
                'updated_at' => '2020-09-29 11:10:21',
            ),
            4 => 
            array (
                //'id' => '13',
                'authors_id' => '6',
                'books_id' => '7',
                'created_at' => '2020-09-30 00:43:39',
                'updated_at' => '2020-09-30 00:43:39',
            ),
            5 => 
            array (
                //'id' => '14',
                'authors_id' => '7',
                'books_id' => '8',
                'created_at' => '2020-09-30 00:46:02',
                'updated_at' => '2020-09-30 00:46:02',
            ),
            6 => 
            array (
                //'id' => '15',
                'authors_id' => '8',
                'books_id' => '9',
                'created_at' => '2020-09-30 00:47:44',
                'updated_at' => '2020-09-30 00:47:44',
            ),
            7 => 
            array (
                //'id' => '16',
                'authors_id' => '9',
                'books_id' => '10',
                'created_at' => '2020-09-30 11:44:31',
                'updated_at' => '2020-09-30 11:44:31',
            ),
            8 => 
            array (
                //'id' => '17',
                'authors_id' => '10',
                'books_id' => '10',
                'created_at' => '2020-09-30 11:44:31',
                'updated_at' => '2020-09-30 11:44:31',
            ),
            9 => 
            array (
                //'id' => '18',
                'authors_id' => '11',
                'books_id' => '10',
                'created_at' => '2020-09-30 11:44:31',
                'updated_at' => '2020-09-30 11:44:31',
            ),
            10 => 
            array (
                //'id' => '19',
                'authors_id' => '12',
                'books_id' => '11',
                'created_at' => '2020-09-30 11:48:09',
                'updated_at' => '2020-09-30 11:48:09',
            ),
            11 => 
            array (
                //'id' => '20',
                'authors_id' => '13',
                'books_id' => '12',
                'created_at' => '2020-09-30 13:45:16',
                'updated_at' => '2020-09-30 13:45:16',
            ),
        ));
        
        
    }
}

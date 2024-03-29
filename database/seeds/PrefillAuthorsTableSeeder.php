<?php

use Illuminate\Database\Seeder;

class PrefillAuthorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('authors')->delete();
        
        \DB::table('authors')->insert(array (
            0 => 
            array (
                //'id' => '0',
                'first_name' => 'Jeff',
                'last_name' => 'Hawkins',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'american',
                'created_at' => '2020-09-29 07:29:06',
                'updated_at' => '2020-09-29 07:29:06',
            ),
            1 => 
            array (
                //'id' => '1',
                'first_name' => 'George',
                'last_name' => 'Orwell',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'English',
                'created_at' => '2020-09-29 07:29:06',
                'updated_at' => '2020-09-29 07:29:06',
            ),
            2 => 
            array (
                //'id' => '2',
                'first_name' => 'Greg',
                'last_name' => 'Bear',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-29 07:34:07',
                'updated_at' => '2020-09-29 07:36:01',
            ),
            3 => 
            array (
                //'id' => '5',
                'first_name' => 'Tariq',
                'last_name' => 'Rashid',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-29 11:09:46',
                'updated_at' => '2020-09-29 11:09:46',
            ),
            4 => 
            array (
                //'id' => '6',
                'first_name' => 'J.E.',
                'last_name' => 'Gordan',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'English',
                'created_at' => '2020-09-30 00:43:22',
                'updated_at' => '2020-09-30 00:43:22',
            ),
            5 => 
            array (
                //'id' => '7',
                'first_name' => 'John',
                'last_name' => 'Drury Clark',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 00:45:49',
                'updated_at' => '2020-09-30 00:45:49',
            ),
            6 => 
            array (
                //'id' => '8',
                'first_name' => 'Richard',
                'last_name' => 'P. Feynman',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 00:47:31',
                'updated_at' => '2020-09-30 00:47:31',
            ),
            7 => 
            array (
                //'id' => '9',
                'first_name' => 'William',
                'last_name' => 'Gibson',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 11:42:36',
                'updated_at' => '2020-09-30 11:42:36',
            ),
            8 => 
            array (
                //'id' => '10',
                'first_name' => 'Molly',
                'last_name' => 'Millions',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 11:42:58',
                'updated_at' => '2020-09-30 11:42:58',
            ),
            9 => 
            array (
                //'id' => '11',
                'first_name' => 'Henry',
                'last_name' => 'Case',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 11:43:25',
                'updated_at' => '2020-09-30 11:43:25',
            ),
            10 => 
            array (
                //'id' => '12',
                'first_name' => 'Kurt',
                'last_name' => 'Vonnegut',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 11:47:10',
                'updated_at' => '2020-09-30 11:47:10',
            ),
            11 => 
            array (
                //'id' => '13',
                'first_name' => 'Ariel',
                'last_name' => 'D. Arencibia',
                'date_of_birth' => '2020-09-29 07:29:06',
                'nationality' => 'American',
                'created_at' => '2020-09-30 13:45:02',
                'updated_at' => '2020-09-30 13:45:02',
            ),
        ));
        
        
    }
}

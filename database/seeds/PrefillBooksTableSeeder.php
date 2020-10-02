<?php

use Illuminate\Database\Seeder;

class PrefillBooksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('books')->delete();
        
        \DB::table('books')->insert(array (
            0 => 
            array (
                'id' => '0',
                'title' => 'On Intelligence',
                'genre' => 'science',
                'publication' => '2003',
                'book_cover' => 'https://i.ibb.co/mNjmLmM/OnInt.png',
                'created_at' => '2020-09-29 07:29:20',
                'updated_at' => '2020-09-29 07:29:20',
            ),
            1 => 
            array (
                'id' => '1',
                'title' => 'Nineteen Eighty-Four',
                'genre' => 'Science fiction',
                'publication' => '1949',
                'book_cover' => 'https://i.ibb.co/bLHRqYp/de862675d0e3.jpg',
                'created_at' => '2020-09-29 07:29:20',
                'updated_at' => '2020-09-29 07:29:20',
            ),
            2 => 
            array (
                'id' => '2',
                'title' => 'Halo: Cryptum',
                'genre' => 'Science fiction',
                'publication' => '2011',
                'book_cover' => 'https://i.ibb.co/27s7CRb/470ad948f455.jpg',
                'created_at' => '2020-09-29 07:34:55',
                'updated_at' => '2020-09-29 07:34:55',
            ),
            3 => 
            array (
                'id' => '6',
                'title' => 'Make Your Own Neural Network: A Gentle Journey Through the Mathematics',
                'genre' => 'Science',
                'publication' => '2016',
                'book_cover' => 'https://i.ibb.co/4RvxBnD/b85af3b124d2.jpg',
                'created_at' => '2020-09-29 11:10:21',
                'updated_at' => '2020-09-29 11:10:21',
            ),
            4 => 
            array (
                'id' => '7',
                'title' => 'Structures: Or Why Things Don\'t Fall Down',
                'genre' => 'Art/architecture',
                'publication' => '2003',
                'book_cover' => 'https://i.ibb.co/VLt6WXT/5987abb8c4e5.jpg',
                'created_at' => '2020-09-30 00:43:39',
                'updated_at' => '2020-09-30 00:43:39',
            ),
            5 => 
            array (
                'id' => '8',
                'title' => 'Ignition!: An informal history of liquid rocket propellants',
                'genre' => 'Science',
                'publication' => '1972',
                'book_cover' => 'https://i.ibb.co/bvSx81J/a3c910234f2d.jpg',
                'created_at' => '2020-09-30 00:46:02',
                'updated_at' => '2020-09-30 00:46:02',
            ),
            6 => 
            array (
                'id' => '9',
                'title' => 'Six Easy Pieces: Essentials of Physics By Its Most Brilliant Teacher',
                'genre' => 'Science',
                'publication' => '1995',
                'book_cover' => 'https://i.ibb.co/BssjgpD/e9a958cf27e6.jpg',
                'created_at' => '2020-09-30 00:47:44',
                'updated_at' => '2020-09-30 00:47:44',
            ),
            7 => 
            array (
                'id' => '10',
                'title' => 'Neuromancer',
                'genre' => 'Science fiction',
                'publication' => '1984',
                'book_cover' => 'https://i.ibb.co/WGb2mTN/bfd0514acf85.jpg',
                'created_at' => '2020-09-30 11:44:31',
                'updated_at' => '2020-09-30 11:44:31',
            ),
            8 => 
            array (
                'id' => '11',
                'title' => 'Cat\'s Cradle',
                'genre' => 'Science fiction',
                'publication' => '1963',
                'book_cover' => 'https://i.ibb.co/56zhybT/a7695b9f2241.jpg',
                'created_at' => '2020-09-30 11:48:09',
                'updated_at' => '2020-09-30 11:48:09',
            ),
            9 => 
            array (
                'id' => '12',
                'title' => 'Plant Genetic Engineering Towards the Third Millennium',
                'genre' => 'Science',
                'publication' => '2000',
                'book_cover' => 'https://i.ibb.co/y60DnfM/c8e469aeedad.jpg',
                'created_at' => '2020-09-30 13:45:16',
                'updated_at' => '2020-09-30 13:45:16',
            ),
        ));
        
        
    }
}
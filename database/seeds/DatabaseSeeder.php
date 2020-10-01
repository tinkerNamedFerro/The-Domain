<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(BooksTableSeeder::class);
        // $this->call(AuthorsTableSeeder::class);
        // $this->call(AuthorsBooksTableSeeder::class);
        // $this->call(ReviewsTableSeeder::class);
        
        // $this->call(UserSeeder::class);
        $this->call(PrefillAuthorsTableSeeder::class);
        $this->call(PrefillBooksTableSeeder::class);
        $this->call(PrefillAuthorsBooksTableSeeder::class);
        $this->call(PrefillReviewsTableSeeder::class);
    }
}

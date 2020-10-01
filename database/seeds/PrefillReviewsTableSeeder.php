<?php

use Illuminate\Database\Seeder;

class PrefillReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reviews')->delete();
        
        \DB::table('reviews')->insert(array (
            0 => 
            array (
                'id' => '0',
                'users_id' => '0',
                'books_id' => '0',
                'written_text' => 'Howdy',
                'rating' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '1',
                'users_id' => '1',
                'books_id' => '0',
                'written_text' => 'I can\'t really say this was a practical book but it definitely gives a different perspective on how the brain works and how the current AI implementations are totally off the target. It\'s enlightening. Worth the read if you are a software developer for sure.',
                'rating' => '4',
                'created_at' => NULL,
                'updated_at' => '2020-09-29 23:59:28',
            ),
            2 => 
            array (
                'id' => '2',
                'users_id' => '2',
                'books_id' => '0',
                'written_text' => 'Key for understanding the different abstraction layers of how likely our brain and intelligence works. Key for understanding new developments in artificial neural networks too',
                'rating' => '5',
                'created_at' => NULL,
                'updated_at' => '2020-09-30 00:00:09',
            ),
            3 => 
            array (
                'id' => '3',
                'users_id' => '3',
                'books_id' => '0',
                'written_text' => 'Interesting high-level theory of how the neocortex works, and a call to create "intelligent" machines that use the same algorithm/structure to perform pattern matching, hierarchical learning and prediction',
                'rating' => '4',
                'created_at' => NULL,
                'updated_at' => '2020-09-29 23:55:25',
            ),
            4 => 
            array (
                'id' => '4',
                'users_id' => '4',
                'books_id' => '0',
                'written_text' => 'Condescending, but interesting. A thousand examples too long. Or, to put it another way, the examples were 1 + 999 too many. Or as one might say, 10*100 examples are too many. In case I haven\'t made myself clear, think of it this way: more than 200 + 800 examples are in this book. This is heady stuff, so let me say it again. 400 + 600 examples are here, and more.

Computers compute, but brains do pattern recognition. Then they do pattern recognition on the patterns they\'ve recognized. Then they recognize patterns of patterns of patterns... etc. It\'s an endless Matryoshka doll of pattern-recognition. Computers don\'t/can\'t work this way. One major difference is the thousands of feedback loops for every connection. Another major difference is the fact that a mechanical binary switch and a biological chemical neuron are dramatically different. The end.',
                'rating' => '3',
                'created_at' => NULL,
                'updated_at' => '2020-09-29 23:41:04',
            ),
            5 => 
            array (
                'id' => '5',
                'users_id' => '5',
                'books_id' => '0',
                'written_text' => 'Enjoyed thoroughly. Read it twice.',
                'rating' => '5',
                'created_at' => NULL,
                'updated_at' => '2020-09-29 23:50:01',
            ),
            6 => 
            array (
                'id' => '6',
                'users_id' => '2',
                'books_id' => '1',
                'written_text' => 'I\'m gonna ask myself a mandatory question and say nothing more.

Why the fuck had I not read this book before?',
                'rating' => '5',
                'created_at' => '2020-09-30 00:22:18',
                'updated_at' => '2020-09-30 00:22:18',
            ),
            7 => 
            array (
                'id' => '8',
                'users_id' => '2',
                'books_id' => '6',
                'written_text' => 'Great introduction to explain main fundamental concepts of neural networks, the graphs are pretty and explain the ideas in good way. highly recommend to those who wanna understand Neural network and the math idea behind it.',
                'rating' => '5',
                'created_at' => '2020-09-30 00:24:59',
                'updated_at' => '2020-09-30 00:24:59',
            ),
            8 => 
            array (
                'id' => '9',
                'users_id' => '2',
                'books_id' => '2',
            'written_text' => 'I really enjoyed this book when I first started reading it, because it was different in tone and style from all the other Halo books I\'ve been (devotedly) reading. The only problem was about halfway through when it started to get a little dry. I just found that Bornstellar wasn\'t the most engaging of characters. He was more interesting when he was confused, because he had emotions even if they weren\'t very deep ones (like curiosity or the need to rebel), and when he started to change and became more passive he grew more and more boring. And when the two human characters left the scene, a lot of the life left the story as well. Maybe it\'s just his style of writing, but I found the battle scenes to be a little dull as well. I confess to rushing through the last thirty pages. Bear is definitely a different kind of writer than the Halo series usually employs, and I liked that aspect, but I find him a little dry (and given that I read a lot of Victorian novels, when I say dry I mean "desert sands" kinda dry) and not as engaging as I\'d wished. Oh well! I\'ll still read the other two.',
                'rating' => '3',
                'created_at' => '2019-09-30 00:27:34',
                'updated_at' => '2019-09-30 00:27:34',
            ),
            9 => 
            array (
                'id' => '10',
                'users_id' => '1',
                'books_id' => '1',
                'written_text' => 'Social media is a cage full of starved rats and all of us have our heads stuck in there now, like it or not.',
                'rating' => '5',
                'created_at' => '2020-09-30 00:35:42',
                'updated_at' => '2020-09-30 00:35:42',
            ),
            10 => 
            array (
                'id' => '11',
                'users_id' => '1',
                'books_id' => '6',
                'written_text' => 'A nice and short introduction to the fundamentals of Neural Networks. The writing is clear and the content is easy to grasp for a beginner. There were a few issues with typos and formatting, but overall , I had a good time with this short book.',
                'rating' => '5',
                'created_at' => '2020-09-30 00:36:10',
                'updated_at' => '2020-09-30 00:36:10',
            ),
            11 => 
            array (
                'id' => '13',
                'users_id' => '1',
                'books_id' => '2',
                'written_text' => 'It was very bland. It felt like an intro to a series that I needed previous knowledge to get on the inside with. Much more do than previous Halo books--i just couldn\'t get into it, and then there wasn\'t much action. It finally got interesting about halfway through the book then fizzled again.',
                'rating' => '2',
                'created_at' => '2019-09-30 00:37:34',
                'updated_at' => '2019-09-30 00:37:34',
            ),
            12 => 
            array (
                'id' => '14',
                'users_id' => '2',
                'books_id' => '8',
                'written_text' => 'Great book. I\'m very glad it\'s back in print. If you\'re interested in science in general, or chemistry or rocketry or the space program, this is an entertaining read, and also very informative, but I\'d definitely say, more than for almost any other book I\'ve seen, DON\'T TRY THIS AT HOME.

This review is definitely for the paperback edition. It seems that people aren\'t too happy with hardcover and kindle editions, FYI.',
                'rating' => '5',
                'created_at' => '2020-09-30 09:17:48',
                'updated_at' => '2020-09-30 09:17:48',
            ),
        ));
        
        
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Books;
use App\Reviews;

class ReviewController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['only'=>['create','store','edit', 'destroy']]);
    }
    /**
     * Function used in BookController, understandable to put this logic in a service
     * As this project is small it saves time
     */
    public function get_reviews($book_id)
    {
        dd("hello");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {   
        $review = DB::table('reviews')->where('users_id', Auth::user()->id)
                                        ->where('books_id', $book_id)->first();   
        // dd($review);
        if (!$review) {
            return view('layouts.reviews.create_form')->with('book_id', $book_id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rating'=> 'required|numeric|gte:1|lte:5',
            'written_text' => 'required|string|min:5',
            'book_id' => 'required|exists:books,id',
            ]);

        $user = Auth::user();
        $book = Books::find($request->book_id);
        #checking if only one 
        $review = DB::table('reviews')->where('users_id', $user->id)
                                        ->where('books_id', $book->id)->first();   

        if (!$review) {
            # Adding review row 
            $review = new Reviews();
            $review->users_id = $user->id;
            $review->books_id = $book->id;
            $review->rating = $request->rating;
            $review->written_text = $request->written_text;
            $review->save();
        }
        return redirect("book/$book->id");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($book_id, $review_id)
    {   
        $review = Reviews::find($review_id);
        return view('layouts.reviews.create_form')->with('book_id', $book_id)->with('review', $review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book_id, $review_id)
    {
        $this->validate($request, [
            'rating'=> 'required|numeric|gte:1|lte:5',
            'written_text' => 'required|string|min:5',
            ]);

        $user = Auth::user();
        $book = Books::find($request->book_id);
        if (!$book){
            return redirect("book/$book->id");
        }
        #checking if only one 
        $review = DB::table('reviews')->where('users_id', $user->id)
                                        ->where('books_id', $book->id)->first();   

        if ($review) {
            # Adding review row 
            $review = Reviews::find($review_id);
            $review->users_id = $user->id;
            $review->books_id = $book->id;
            $review->rating = $request->rating;
            $review->written_text = $request->written_text;
            $review->save();
        }
        return redirect("book/$book->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

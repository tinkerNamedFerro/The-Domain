<?php

namespace App\Http\Controllers;
use App\Image; 
use App\Scrapper; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Config;
use App\Books;
use App\Authors;
use App\User;
use App\Authors_Books;
use App\Reviews;



use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Rules\GenreDropDown;
use App\Rules\BookTitleChange;
class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $books = Books::query();
        
        // filter books 
        $query_param = array();
        foreach ($request->query as $key => $item){
            $query_param[$key] = $item;
            if ($key == "title"){
                $books = $books->whereRaw('lower(title) like (?)',["%{$item}%"]);
            }elseif ($key == "author"){

                $books = $books->join('authors_books', 'books.id', '=', 'authors_books.books_id') //Linking books to authors_books
                               ->join('authors', 'authors_books.authors_id' , '=', 'authors.id')  //Linking authors to authors_books
                               ->orWhereRaw('lower(authors.first_name) like (?)',["%{$item}%"]) // Check first_name
                               ->orWhereRaw('lower(authors.last_name) like (?)',["%{$item}%"]) // Check last_name
                               ->orWhereRaw("lower(authors.first_name || ' ' || authors.last_name) LIKE (?)",["%{$item}%"]); // Check last_name
                               
            }elseif ($key == "genre"){
                $books = $books->whereRaw('lower(genre) like (?)',["%{$item}%"]);
            }elseif ($key == "year"){
                $books = $books->where('publication', '=', $item);
            }
        }
        $books = $books->get();
        
        $books->sortBy('id');
        
        //$books = $books->sortByDesc('id');

        $books = $books->sortByDesc(function ($book, $key) { //$book row and key is index
            return $book->reviews()->avg('rating');
        });
        // dd($books[0]->reviews);
        // dd($request->query('genre'));
        //halfmoon.index
        return(view('layouts.books.index')->with('books', $books)->with('genre', Config::get('constants.genre'))->with('query_param',$query_param));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved"){
            // if ($request->query->has('author')) {
            //     $new_author = Authors::find($request->query["author"]); 
            // }else{
            //     $new_author = "null";}
            return view('layouts.books.create_form')->with('genre', Config::get('constants.genre'))
                    ->with('authors', Authors::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved"){
            switch ($request->input('action')) {
                case 'add_author':
                    session(['title' => $request->title]);
                    session(['publication' => $request->publication]);
                    session(['genre' => $request->genre]);
                    session(['imagebase64' => $request->imagebase64]);
                    return redirect("author/create");
                    break;
        
                case 'add_book':   
                    $rules = [
                        'title'=> 'required|max:255|unique:books,title',
                        'publication' => 'required|numeric|gte:1700|lte:2021',
                        'genre'=> ['required','string',new GenreDropDown],
                        'imagebase64'=> 'required',
                        'addmore' => 'required'
                    ];
                    if ($request->input('addmore')!= null){
                        foreach($request->input('addmore') as $key => $value) {
                            $rules["addmore.{$key}"] = 'required|exists:authors,id';
                        }
                    }

                    $this->validate($request, $rules);
                    $Image = new Image();
                    // dd($request->imagebase64);
                    $book_cover = $Image->upload_image($request->imagebase64);
                    //Add book
                    $book = new Books();
                    $book->title = $request->title;
                    $book->publication = $request->publication;
                    $book->genre= $request->genre; 
                    $book->book_cover= $book_cover; 
                    $book->save();
                    
                    //add both to linking table
                    foreach($request->input('addmore') as $key => $value) {
                        $linking = new Authors_Books();
                        $linking->authors_id = $key ;
                        $linking->books_id = $book->id;
                        $linking->save();
                    }
                    
                    $request->session()->forget(['title', 'publication','genre', 'imagebase64']);
                    return redirect("book/$book->id");
                    break;
            }    
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::find($id);
        if (Auth::check()){
            $review_exists = DB::table('reviews')->where('users_id', Auth::user()->id)
                ->where('books_id', $id)->exists();   
        }else{
            $review_exists = true;
        }
        // $reviews = DB::table('reviews')->where('books_id', $book->id)->paginate(2);
        $reviews = Reviews::where('books_id', $book->id)->paginate(2);
        // dd($reviews[0]->users->name);
        return view('layouts.books.show')->with('book', $book)->with('review_exists', $review_exists)->with('reviews', $reviews);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['edit_book_id' => $id]);
        $book = Books::find($id);
        return view('layouts.books.edit_form')->with('book',$book)->with('genre', Config::get('constants.genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved"){
            $this->validate($request, [
                'title'=> ['required' ,'max:255',new BookTitleChange($id)],
                'publication' => 'required|numeric|gte:1701|lte:2020',
                'genre'=> ['required','string',new GenreDropDown],
                'first_name'=> 'required',
                'last_name'=> 'required',
                'date_of_birth'=> 'required|date',
                'nationality'=> 'required',
                ]);
            //Add book
            $book = Books::find($id);
            $book->title = $request->title;
            $book->publication = $request->publication;
            $book->genre= $request->genre; 
            $book->save();
            // Check if author exists with first,last name and dob
                                     
            $author = Authors::where('id', $request->id)->first();
    
            $author->first_name = $request->first_name;
            $author->last_name = $request->last_name;
            $author->date_of_birth= $request->date_of_birth; 
            $author->nationality= $request->nationality; 
            $author->save();
        
            
            //Remove session
            $request->session()->forget(['edit_book_id']);
            return redirect("/book/$id");
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get all book_author_link_table
        $book_with_author = DB::table('authors_books')->where('books_id', $id);
        //Loop through all results and check if there is more than one author_books_link
        foreach ($book_with_author->get() as $row){
            $book_with_author = DB::table('authors_books')->where('authors_id', $row->authors_id);
            
            if ($book_with_author->count() == 1){
                //If count == 1, delete author, link table row
                $book_with_author->delete();
                Authors::find($row->authors_id)->delete();
            }else{
                // If count > 1, delete link table row 
                Authors_Books::find($row->id)->delete();
            }
        }
        //Delete all comments where books_id == $id 
        $book_with_author = DB::table('reviews')->where('books_id', $id)->delete();
        // Delete book 
        Books::find($id)->delete();
        return redirect("book");
    }

    public function filter(Request $request){
        $this->validate($request, [
            'title'=> 'max:255',
            'year' => 'numeric|gte:1700|lte:2021|nullable',
            'genre'=> ['string'],
            'Author'=> 'max:255',
            ]);
        $query_string = "?";
        foreach ($request->all() as $key => $item){
            if ($item != "" and $item != "0" and !strpos($key, 'token')){
                    $query_string .= $key."=".$item."&";
            }
        }
        // dd($query_string);
        return redirect("book/$query_string");
    }

    public function highest_rating(Request $request)
    {
        // Get all books with reviews from the last 30 days 
        $books = Books::cursor()->filter(function ($book, $key) { //$book row and key is index
                // dd();
                if ($book->reviews()->count() > 2){ //At least two comments
                    return $book->reviews()->orderBy('updated_at', 'desc')->first()->updated_at > Carbon::now()->subDays(30); // Get with comment from last 30 days
                }else{
                    return false;
                }
                    //return ($book->reviews()->whereDate('updated_at', '>', Carbon::now()->subDays(30)));
        });

        $books = $books->sortByDesc(function ($book, $key) { //$book row and key is index
            return $book->reviews()->avg('rating');
        });
        $books = $books->pluck('id')->toArray();
        $books = Books::findMany($books); //Convert to elquent to use easy fk
        $books = $books->take(5);
        return(view('layouts.books.hot')->with('books', $books));
    }

    public function recommend_books(Request $request)
    {
        $recommended_allowed = false;
        $books = "null";
        if (Auth::check()){
            // dd(User::find(2)->reviews()->count());
            $user = User::find(Auth::user()->id);
            if ($user->reviews()->count() >= 3){ // check if logged in user as more than 3 reviews 
                $recommended_allowed = true;
                
                $read_books = $user->reviews()->pluck("books_id"); // Will be used as whereNotIn when getting books 
                $similar_users = User::query()->join("reviews", 'users.id', "reviews.users_id")
                                ->where('users_id', '!=' , Auth::user()->id) // Exclude logged in user id 
                                ->groupBy('users_id')
                                ->whereIn('reviews.books_id', function($query){
                                    $query->select('books_id')
                                        ->from('reviews')
                                        ->where('users_id', Auth::user()->id);
                                })->pluck('reviews.users_id');

                //
                //dd($similar_users);
                // Get list of books that similar_users have reviewd but signed in user hasn't 
                $books = Books::query()->join('reviews', 'books.id', '=', 'reviews.books_id')
                                        ->whereIn('reviews.users_id', $similar_users)
                                        ->whereNotIn('books.id', $read_books)->get();

                //Sort by rating 
                $books = $books->sortByDesc(function ($book, $key) { //$book row and key is index
                    return $book->reviews()->avg('rating');
                });
                
                // Take the first four 
                
                $books = $books->pluck('title')->toArray();
                //dd($books);
                $books = Books::whereIn("title",$books)->get();
                // dd($books);
                $books = $books->take(5);
                // dd($books);
            }
        }
        return(view('layouts.books.recommended')->with('books', $books)->with('recommended_allowed',$recommended_allowed));
       

       // Get books that have user reviews 
    }
    public function get_book(Request $request, $id)
    {
        $book = Books::find($id);
        $author = $book->authors()->first();
        $author_name = $author->first_name."+".$author->last_name;
        //dd($author_name);
        $scrapper = New Scrapper;
        $test = $scrapper->get_search_table($book->title, $author_name, $book->publication);
        //dd($scrapper->download_url);
        return redirect($scrapper->download_url);
        //return(view('layouts.books.renders.epub')->with('download_url', $scrapper->download_url)->with('book',$book));
    }
}

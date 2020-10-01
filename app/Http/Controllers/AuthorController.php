<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Config;
use App\Books;
use App\Authors;
use App\Authors_Books;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Rules\AuthorExists;
use App\Rules\AuthorExistsEdit;


class AuthorController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved"){
            return view('layouts.authors.create_form');
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
        // $this->validate($request, [
            
        //     ]);
        Validator::make($request->all(), [
            'first_name'=> ['required',new AuthorExists($request->last_name,$request->date_of_birth)],
            'last_name'=> 'required',
            'date_of_birth'=> 'required|date',
            'nationality'=> 'required',
        ])->validate();

            // Create author table row 
        $author = new Authors();
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->date_of_birth= $request->date_of_birth; 
        $author->nationality= $request->nationality; 
        $author->save();
        return redirect("book/create?author=$author->id");
    }
    public function show($id)
    {}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved"){
            return view('layouts.authors.edit_form')->with('author', Authors::find($id));
        }
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
         // $this->validate($request, [
            
        //     ]);
        Validator::make($request->all(), [
            'first_name'=> ['required',new AuthorExistsEdit($request->last_name,$request->date_of_birth, $id)],
            'last_name'=> 'required',
            'date_of_birth'=> 'required|date',
            'nationality'=> 'required',
        ])->validate();

            // Create author table row 
        $author = Authors::find($id);
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->date_of_birth= $request->date_of_birth; 
        $author->nationality= $request->nationality; 
        $author->save();
        $url = "/book/".Session::get('edit_book_id')."/edit";
        return redirect($url);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author_book_linking = DB::table('authors_books')->where('authors_id', $id);
        $book_with_author = DB::table('authors_books')->where('books_id', Session::get('edit_book_id'));
        if ($book_with_author->count() > 1){
            if ($author_book_linking->count() == 1){
                
                $author_book_linking = DB::table('authors_books')->where('authors_id', $id)->where('books_id', Session::get('edit_book_id'))->delete();
            }else{
                $author_book_linking = DB::table('authors_books')->where('authors_id', $id)->where('books_id', Session::get('edit_book_id'))->delete();
            }
            $repsonse = ['status' => 'success'];
        }else{
            $repsonse = ['status' => 'failed', "error" => "Must have one author"];
        }
        
        return response()->json($repsonse);

    }
}

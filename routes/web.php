<?php

use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('/book');
//return view('welcome');
});

Auth::routes();
Route::resource('book','BookController');
Route::resource('author','AuthorController');
Route::post('book/filter', 'BookController@filter')->name('book.filter');
Route::get('list/book/hot', 'BookController@highest_rating')->name('book.hot');
Route::get('list/book/recommended', 'BookController@recommend_books')->name('book.recommended'); // cannot be book/hot as it'll go to show
Route::get('get/book/{id}', 'BookController@get_book')->name('book.getBook');
//--------------------------------------------------------
// Individual rates to provide custom parameter data
Route::get('review/{book_id}', 'ReviewController@create')->name('review.create');
Route::get('review/{book_id}/{review_id}', 'ReviewController@edit')->name('review.edit');
Route::put('review/update/{book_id}/{review_id}', 'ReviewController@update')->name('review.update');
Route::post('review/store', 'ReviewController@store')->name('review.store');
//--------------------------------------------------------
// Admin controller used for curator approve
Route::get('admin/list_curators', 'AdminController@index')->name('admin.list_curators');
Route::get('admin/approve/{curator_id}', 'AdminController@approve')->name('admin.approve_curator');
//--------------------------------------------------------
// Route::resource('review','ReviewController');
Route::get('/home', 'HomeController@index')->name('home');
//-----------------------------------------------------
// Documentation
Route::get('/documentation', function(){
    return view('layouts.documentation.index');
})->name('documentation');

Route::get('/documentation/requirements', function(){
    return view('layouts.documentation.developmentBreakdown');
})->name('requirements');


Route::get('/test', function(){
    return view('halfmoon.index');
});

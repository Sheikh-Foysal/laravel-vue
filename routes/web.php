<?php

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
    return view('public.index');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    // Post
    Route::get('/posts','PostController@all_posts')->name('posts');
    Route::get('/edit_post/{id}','PostController@edit_post');
    Route::post('/savepost','PostController@save_post');
    Route::get('/delete_post/{id}','PostController@delete_post');
    Route::post('/update-post/{id}','PostController@update_post');
    
    
    //Category
    Route::post('/add-category','CategoryController@add_category');
    Route::get('/category','CategoryController@all_category');
    Route::get('/category/{id}','CategoryController@delete_category');
    Route::get('/editcategory/{id}','CategoryController@edit_category');
    Route::post('/update-category/{id}','CategoryController@update_category');
});

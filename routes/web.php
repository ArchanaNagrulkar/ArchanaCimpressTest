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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogs', 'BlogsController@index')->name('blogs');
// Authenticated users can acess those routes
Route::middleware('auth')->group(function () {
Route::get('/blogs/add', 'BlogsController@create')->name('blogs.create');
Route::get('/blogs/edit/{id}', 'BlogsController@edit')->name('blogs.edit');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.save');
Route::post('/blogs/update/{id}', 'BlogsController@update')->name('blogs.update');
Route::get('/blogs/show/{id}', 'BlogsController@show')->name('blogs.show');
});


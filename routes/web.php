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

Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function () {
    //List of routes for Product (article) module
    Route::get('/article', 'ArticleController@index')->name('article.index');

    Route::get('/search', 'ArticleController@search')->name('article.search');

    Route::get('/article/create', 'ArticleController@create')->name('article.create');

    Route::post('/article', 'ArticleController@store')->name('article.store');

    Route::get('/article/{id}/edit', 'ArticleController@edit')->name('article.edit');

    Route::put('/article/{id}', 'ArticleController@update')->name('article.update');

    Route::delete('/article/{id}', 'ArticleController@destroy')->name('article.destroy');

    // fin route product
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

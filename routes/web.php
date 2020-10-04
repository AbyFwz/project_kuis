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

// Route::get('/', function () {
//     return view('welcome');
// });

// Index
Route::get('/', 'HomeController@index')->name('home');

// About Page
Route::get('/about', 'AboutController')->name('about');

// Article
Route::get('/article/{slug}', 'ArticleController@viewArticle');
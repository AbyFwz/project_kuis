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

// Admin Page Group
Route::group(['middleware' => ['adminLogin']], function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    // Admin Settings
    Route::get('/admin/settings', 'AdminController@settings');
    // Articles Manage View
    Route::get('/admin/blog/articles', 'ArticleController@manage');
    // Articles Manage Add
    Route::match(['get', 'post'], '/admin/blog/add-article', 'ArticleController@createArticle');
    // Articles Manage Update
    Route::match(['get', 'post'], '/admin/blog/edit-article/{id}', 'ArticleController@updateArticle');
    // Articles Manage Delete
    Route::get('/admin/blog/delete-article/{id}', 'ArticleController@delete');
});
// Admin Login
Route::match(['get', 'post'], '/admin', 'AdminController@login')->name('login');
// Admin Logout
Route::get('/logout', 'AdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

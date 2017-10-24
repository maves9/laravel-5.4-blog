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

Route::get('/', 'PagesController@index')->name('welcome');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@contactSend');

Route::post('posts/{post}/reply', 'CommentController@postReply')->name('posts.reply');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('user', 'ProfileController');
Route::post('user/{user}', 'UpdateUserImage@imgReset');

/**
 * Search
 */

 Route::get('/search', [
    'uses' => 'SearchController@getResults',
    'as' => 'search.results',
]);

/**
 * Admin
 */

 Route::get('/admin', [
    'uses' => 'AdminController@getResults',
    'as' => 'admin.index',
]);

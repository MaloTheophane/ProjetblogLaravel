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

 
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('/articles', 'ArticlesController'); 
Route::get('admin/articles', 'ArticlesController@index'); 
Route::post('/articles/{id}/comment','PostsController@comment');
Route::get('mes_articles', 'PostsController@shows');
Route::get('admin/users', 'UsersController@index');

Route::get('/admin/users/{id}/delete', 'UsersController@delete');
Route::get('/admin/users/{id}/role', 'UsersController@faireadministrer');

Route::get('/articles', 'PostsController@index');
Route::get('/contact', 'ContactsController@create');
Route::post('/contact', 'ContactsController@store');
Route::get('contact/{id}', 'ContactsController@affiche');

Route::get('/comment/edit/{id}', 'CommentController@edit');
Route::post('/comment/edit/{id}', 'CommentController@update');

Route::get('/comment/autoriser/{id}', 'CommentController@autoriser');
Route::get('/comment/bloquer/{id}', 'CommentController@bloquer');

Route::get('/comment/gerer/{id}', 'PostsController@commentairesDePost');
Route::get('/comment/delete/{id}', 'CommentController@delete');


Auth::routes();


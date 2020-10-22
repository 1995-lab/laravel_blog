<?php

use Illuminate\Support\Facades\Route;

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
// Route::when('*','csrf',['post','put','delete']);
Route::get('/',['as'=>'home','uses'=>'Postscontroller@index']);
Auth::routes();
Route::get('/posts/{slug}',['as'=>'posts.show','uses'=>'Postscontroller@show']);

Route::get('/home','Postscontroller@index')->name('home');

Route::group(['before'=>'admin'],function(){
Route::get('admin',['as'=>'home.admin','uses'=>'HomeController@admin']);
Route::get('admin/posts',['as'=>'posts.admin','uses'=>'Postscontroller@admin']);
Route::get('admin/posts/{id}',['as'=>'posts.edit','uses'=>'Postscontroller@edit']);
Route::get('admin/posts/delete/{id}',['as'=>'posts.delete','uses'=>'Postscontroller@delete']);
Route::get('admin/posts/update/{id}',['as'=>'posts.update','uses'=>'Postscontroller@update']);
Route::get('admin/posts/create',['as'=>'posts.create','uses'=>'Postscontroller@create']);
Route::post('admin/posts/store',['as'=>'posts.store','uses'=>'Postscontroller@store']);
Route::get('admin/comments',['as'=>'comments.admin','uses'=>'CommentsController@admin']);
Route::get('admin/comments/delete/{id}',['as'=>'comments.delete','uses'=>'CommentsController@delete']);
Route::get('admin/users',['as'=>'users.admin','uses'=>'UsersController@admin']);
Route::get('admin/users/{id}',['as'=>'users.delete','uses'=>'UsersController@delete']);
Route::post('admin/permission/{id}',['as'=>'users.permission','uses'=>'UsersController@permission']);
});
// Route::group(['before'=>'auth'],function(){

// Route::post('posts/{id}/comments/create',['as'=>'comments.create','uses'=>'CommentsController@create']);

// });

Route::post('/posts/{id}/comments', 'CommentsController@create')->name('comments.create');
Route::get('/users/create',['as'=>'users.create','uses'=>'UsersController@create']);
Route::post('/users/store',['as'=>'users.store','uses'=>'UsersController@store']);
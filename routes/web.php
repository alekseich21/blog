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

Route::get('/', 'SiteController@index');
Route::get('/my-posts', 'SiteController@myPosts')->name('my-posts');
Route::get('/popular-posts', 'SiteController@popularPosts')->name('popular-posts');
Route::get('/posts-no-comments', 'SiteController@postsWithoutComments')->name('posts-no-comments');
Route::get('/profile/{id}', 'UserController@showProfile')->name('user-profile');
Route::post('/', 'CommentController@addComment')->name('comments-add');
Route::post('/file', 'FileController@save')->name('save-file');
Route::get('/file/{id}', 'FileController@edit')->name('edit-file');
Route::post('/file/update/{id}', 'FileController@update')->name('update-file');

Route::get('/post', function () {
    dump(123);
});

Auth::routes();
Route::resource('/posts', 'Admin\PostController');
Route::resource('/categories', 'Admin\CategoryController');
Route::resource('/tags', 'Admin\TagController');
Route::get('/home', 'HomeController@index')->name('home');

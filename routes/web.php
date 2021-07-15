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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'namespace' => 'Front',
    'middleware' => 'auth'
],function (){


    Route::post('/file', 'FileController@save')->name('save-file');
    Route::post('/file/update/{id}', 'FileController@update')->name('update-file');
    Route::get('/file/edit/{id}', 'FileController@edit')->name('file-edit');
    Route::get('/category/create', 'CategoryController@create')->name('category-create');
    Route::post('/category', 'CategoryController@store')->name('save-category');
    Route::get('/post/create', 'PostController@create')->name('post-create');
    Route::get('/post/{id}', 'PostController@showPost')->name('post-show');
    Route::post('/post/store', 'PostController@store')->name('save-post');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post-edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('update-post');
    Route::get('/tag/create', 'TagController@create')->name('tag-create');
    Route::get('/tag/{id}', 'TagController@showTag')->name('tag-show');
    Route::post('/tag/store', 'TagController@store')->name('save-tag');
    Route::get('/', 'SiteController@index')->name('index');
    Route::get('/my-posts', 'SiteController@myPosts')->name('my-posts');
    Route::get('/posts-no-comments', 'SiteController@postsWithoutComments')->name('posts-no-comments');
    Route::get('/popular-posts', 'SiteController@popularPosts')->name('popular-posts');
    Route::get('/profile/{id}', 'SiteController@showProfile')->name('profile');
    Route::post('/comment/store', 'CommentController@store')->name('comment-add');
    Route::post('/reply/store', 'CommentController@replyStore')->name('reply-add');

});

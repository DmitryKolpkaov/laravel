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

//Route вывод напрямую
Route::get('/', function () {
    return view('welcome');
});

Route::get ('/test', function()
{
   return 'test';
});

//Route вывод через контроллер

//MyPlaceController
Route::get ('/', 'App\Http\Controllers\HomeController@index');

//Post
Route::group(['namespace'=> 'App\Http\Controllers\Post'], function() {

    Route::get ('/posts', 'IndexController')->name('post.index');
    Route::get ('/posts/create', 'CreateController')->name('post.create');
    Route::post ('/posts', 'StoreController')->name('post.store');
    Route::get ('/posts/{post}', 'ShowController')->name('post.show');
    Route::get ('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch ('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete ('/posts/{post}', 'DestroyController')->name('post.delete');
});

//Admin
Route::group(['namespace'=> 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function(){
    Route::group(['namespace'=> 'Post'], function(){
        Route::get( '/post', 'IndexController' )->name( 'admin.post.index' );
    });
});





Route::get ('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get ('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get ('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get ('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

//Views
Route::get ('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get ('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get ('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

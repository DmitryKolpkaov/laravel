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
Route::get ('/my_place', 'App\Http\Controllers\MyPlaceController@index');

//PostController
Route::get ('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');
Route::get ('/posts/create', 'App\Http\Controllers\PostController@create');
Route::get ('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get ('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get ('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get ('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

//Views
Route::get ('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get ('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get ('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');

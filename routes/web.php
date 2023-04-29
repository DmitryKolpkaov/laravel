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
Route::get ('/posts', 'App\Http\Controllers\PostController@index');
Route::get ('/posts/create', 'App\Http\Controllers\PostController@create');

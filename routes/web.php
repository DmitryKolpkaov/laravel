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

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/test', function()
{
   return 'test';
});

Route::get ('/my_place', 'App\Http\Controllers\MyPlaceController@index');

Route::get ('/posts', 'App\Http\Controllers\PostController@index');

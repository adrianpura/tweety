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

//DB::listen(function ($query) {
//    var_dump($query->sql,$query->bindings);
//});


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/tweets', 'TweetsController@store');
    Route::get('/tweets', 'TweetsController@index')->name('home');

    Route::post('/profiles/{user}/follow', 'FollowsController@store');
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
});

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Auth::routes();

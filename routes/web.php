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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/personal/interests', 'PersonalController@interests');
Route::get('/interests/unsubscribe/{interest}', 'PersonalController@unsubscribe');
Route::get('/interests/subscribe/{interest}', 'PersonalController@subscribe');

Route::get('/personal/likes/', 'PersonalController@getLikes');

Route::get('/profile/', ['uses' => 'ProfileController@show']);
Route::get('/profile/{user}', ['uses' => 'ProfileController@show']);

Route::get('/personal/matches/', 'PersonalController@getMatches');


Route::get('/suggestions', 'ProfileController@getSuggestions');






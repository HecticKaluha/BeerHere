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

Route::get('/', 'IndexController@index')->name('index');


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

Route::get('/settings', 'SettingsController@index');
Route::put('/settings/editprofile', 'SettingsController@editProfile');

//CRUD routes
Route::get('/interests', 'InterestController@index');
Route::get('/interests/edit/{interest}', 'InterestController@edit');
Route::put('/interests/update/{interest}', 'InterestController@update');
Route::post('/interests/delete/{interest}', 'InterestController@destroy');



//Ajax endpoints
Route::post('/validate/image','ImageUploadController@validateUpload');
Route::post('/upload/images','ImageUploadController@uploadImages');

Route::post('/like', 'ProfileController@like');
Route::post('/dislike', 'ProfileController@dislike');


Route::get('/nextsuggestion', 'ProfileController@getNextSuggestion');

Route::post('/getcommoninterests', 'ProfileController@getCommonInterests');
//Route::get('/getcommoninterests', 'ProfileController@getCommonInterests');


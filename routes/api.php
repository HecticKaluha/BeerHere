<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('authenticate', 'AuthController@authenticate')->name('api.authenticate');
    Route::post('register', 'AuthController@register')->name('api.register');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'interests'], function () {
    Route::get('/interests/unsubscribe/{interest}', 'PersonalController@unsubscribe')->name('api.unsubscribeToInterest');
    Route::get('/interests/subscribe/{interest}', 'PersonalController@subscribe')->name('api.subscribeToInterest');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'personal'], function () {
    Route::get('/personal/interests', 'PersonalController@interests')->name('api.getPersonalInterests');
    Route::get('/personal/likes/', 'PersonalController@getLikes')->name('api.getLikes');
    Route::get('/personal/matches/', 'PersonalController@getMatches')->name('api.getMatches');
    Route::get('/personal/suggestions', 'ProfileController@getSuggestions')->name('api.getSuggestions');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'profile'], function () {
    Route::get('/profile/', ['uses' => 'ProfileController@show'])->name('api.getPersonalProfile');
    Route::get('/profile/{user}', ['uses' => 'ProfileController@show'])->name('api.getProfile');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'settings'], function () {
    Route::get('/settings', 'SettingsController@index')->name('api.settings');
    Route::put('/settings/editprofile', 'SettingsController@editProfile')->name('api.editProfile');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'uploads'], function () {
    Route::post('/upload/images','ImageUploadController@uploadImages')->name('api.uploadImages');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'ajax'], function () {
    Route::post('/validate/image','ImageUploadController@validateUpload')->name('api.validateImage');
    Route::post('/validate/images','ImageUploadController@validateMultipleUploads')->name('api.validateImages');

    Route::post('/like', 'ProfileController@like')->name('api.like');
    Route::post('/dislike', 'ProfileController@dislike')->name('api.dislike');

    Route::get('/nextsuggestion', 'ProfileController@getNextSuggestion')->name('api.nextSuggestion');

    Route::post('/getcommoninterests', 'ProfileController@getCommonInterests')->name('api.getCommonInterests');
});
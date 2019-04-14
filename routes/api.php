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

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    //auth
    Route::post('authenticate', 'AuthController@authenticate')->name('api.authenticate');
    Route::post('register', 'AuthController@register')->name('api.register');

    //home
    Route::get('/home', 'HomeController@index')->name('api.home');

    //interests
    Route::get('/interests/unsubscribe/{interest}', 'PersonalController@unsubscribe')->name('api.unsubscribeToInterest');
    Route::get('/interests/subscribe/{interest}', 'PersonalController@subscribe')->name('api.subscribeToInterest');

    //personal
    Route::get('/personal/interests', 'PersonalController@interests')->name('api.getPersonalInterests');
    Route::get('/personal/likes/', 'PersonalController@getLikes')->name('api.getLikes');
    Route::get('/personal/matches/', 'PersonalController@getMatches')->name('api.getMatches');
    Route::get('/personal/suggestions', 'ProfileController@getSuggestions')->name('api.getSuggestions');

   //profile
    Route::get('/profile/', ['uses' => 'ProfileController@show'])->name('api.getPersonalProfile');
    Route::get('/profile/{user}', ['uses' => 'ProfileController@show'])->name('api.getProfile');


    //settings
    Route::get('/settings', 'SettingsController@index')->name('api.settings');
    Route::put('/settings/editprofile', 'SettingsController@editProfile')->name('api.editProfile');

    //upload
    //to test
    Route::post('/upload/images','ImageUploadController@uploadImages')->name('api.uploadImages');

    //ajax
    Route::post('/validate/image','ImageUploadController@validateUpload')->name('api.validateImage');
    Route::post('/validate/images','ImageUploadController@validateMultipleUploads')->name('api.validateImages');

    Route::post('/like', 'ProfileController@like')->name('api.like');
    Route::post('/dislike', 'ProfileController@dislike')->name('api.dislike');

    Route::get('/nextsuggestion', 'ProfileController@getNextSuggestion')->name('api.nextSuggestion');

    Route::post('/getcommoninterests', 'ProfileController@getCommonInterests')->name('api.getCommonInterests');
});
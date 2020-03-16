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
Route::post('signup', 'AuthController@signup');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'auth:api', 'prefix'=>"/"], function() {
    Route::get('logout', 'AuthController@logout');

    /**
     * Client endpoint
     **/ 
    Route::group(['prefix'=>"/cliente"], function() {
        Route::get('/', 'UserController@index');
        Route::get('/{user}', 'UserController@show');
        Route::put('/{user}', 'UserController@update');
        Route::delete('/{user}', 'UserController@destroy');
    });


});

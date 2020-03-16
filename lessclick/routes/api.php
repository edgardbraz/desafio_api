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

    /**
     * Event endpoint
     **/ 
    Route::group(['prefix'=>"/evento"], function() {
        Route::get('/', 'EventController@index');
        Route::post('/', 'EventController@store');

        //Slug parameter
        Route::group(['prefix'=>"/{event}"], function() {
            Route::get('/', 'EventController@show');
            Route::put('/', 'EventController@update');
            Route::delete('/', 'EventController@destroy');

            /**
             * Ticket endpoint
             **/ 
            Route::group(['prefix'=>"/ingresso"], function() {
                Route::get('/', 'TicketController@index');
            });

            /**
             * Cart endpoint
             **/ 
            Route::group(['prefix'=>"/cart"], function() {
                Route::post('/', 'SalesController@store');
                Route::post('/clear', 'SalesController@clear');
            });

        });
    });

});

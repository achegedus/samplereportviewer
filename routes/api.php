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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');


// Admin routes
Route::group(['prefix' => 'v1', 'middleware' => 'auth0.jwt'], function () {
    Route::get('test', 'TestController@index');

    Route::post('report', 'ReportsController@store');
    Route::put('report/{id}', 'ReportsController@update');
    Route::delete('report/{id}', 'ReportsController@destroy');
});

// Public routes
Route::group(['prefix' => 'v1', 'middleware' => 'api'], function() {
    Route::get('reports', 'ReportsController@index');
    Route::get('report/{id}', 'ReportsController@show');
});
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
Route::group(['prefix' => 'v1/admin', 'middleware' => 'auth0.jwt'], function () {
    Route::get('reports', 'Admin\ReportsController@index');
    Route::get('report/{id}', 'Admin\ReportsController@show');
    Route::post('report', 'Admin\ReportsController@store');
    Route::put('report/{id}', 'Admin\ReportsController@update');
    Route::delete('report/{id}', 'Admin\ReportsController@destroy');

    Route::get('patterns', 'Admin\PatternsController@index');
    Route::get('groups', 'Admin\GroupsController@index');
    Route::get('topics', 'Admin\TopicsController@index');

    Route::get('report/{id}/images', 'Admin\ImagesController@index');
    Route::get('report/{id}/images/{filename}', 'Admin\ImagesController@show');
    Route::post('report/{id}/image', 'Admin\ImagesController@store');
    Route::delete('report/{report_id}/image/{image_id}', 'Admin\ImagesController@destroy');
});

// Public routes
Route::group(['prefix' => 'v1', 'middleware' => 'api'], function() {
    Route::get('reports', 'ReportsController@index');
    Route::get('report/{id}', 'ReportsController@show');
    Route::get('patterns', 'PatternsController@index');
    Route::get('pattern/{id}', 'PatternsController@show');

    Route::get('counter', 'StatsController@index');
});
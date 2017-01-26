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
    return view('home_page');
});

Route::get('/app/{catchall?}', function () {
    return response()->view('home_page');
})->where('catchall', '(.*)');

Route::get('/admin/{catchall?}', function () {
    return response()->view('home_page');
})->where('catchall', '(.*)');

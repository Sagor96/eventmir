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

// Service Area
Route::resource('services', 'ServiceController');
Route::apiresource('Services', 'ServiceController');

// Client Area
Route::resource('clients', 'ClientController');
Route::apiresource('clients', 'ClientController');

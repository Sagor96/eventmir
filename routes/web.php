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

//Auth section
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Service Area
Route::resource('services', 'ServiceController');
Route::apiresource('Services', 'ServiceController');

// Client Area
Route::resource('clients', 'ClientController');
Route::apiresource('clients', 'ClientController');

// Event Type Area
Route::resource('types', 'TypeController');
Route::apiresource('types', 'TypeController');

// Venue Area
Route::resource('venues', 'VenueController');
Route::apiresource('venues', 'VenueController');

// Event Area
Route::resource('events', 'EventController');
Route::apiresource('events', 'EventController');

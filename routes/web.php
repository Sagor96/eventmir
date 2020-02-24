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

//Service Provider Area
Route::get('/sprovider/sprovider','SproviderAuthController@index')->name('sprovider.index');
Route::get('/sprovider/add','SproviderAuthController@create')->name('sprovider.create');
Route::post('/sprovider/store','SproviderAuthController@storeAdmin')->name('sprovider.store');

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

//Auth Area
//routes for guest Service Provider
	  Route::group(['middleware'=>'guest'],function(){
    Route::get('/sprovider/login','SproviderAuthController@login')->name('sprovider.login');
    Route::get('/sprovider/register','SproviderAuthController@register')->name('sprovider.register');
    Route::get('/sprovider/home','SproviderAuthController@home')->name('sprovider.home');
    Route::get('/sp_dashboard', 'ProviderController@index')->name('sp_dashboard');
    Route::get('/sp_logout','SproviderAuthController@logoutSprovider')->name('sp_logout');

    Route::post('/sprovider/login','SproviderAuthController@authenticate')->name('sprovider.auth');
    Route::post('/sprovider/store','SproviderAuthController@store')->name('sprovider.store');
});

//routes for guest Service Provider
	  Route::group(['middleware'=>'guest'],function(){
    Route::get('/clientlog/login','ClientlogController@login')->name('clientlog.login');
    Route::get('/clientlog/register','ClientlogController@register')->name('clientlog.register');
    Route::get('/clientlog/home','ClientlogController@home')->name('clientlog.home');
    Route::get('/cl_dashboard', 'ClientlogController@index')->name('cl_dashboard');
    Route::get('/cl_logout','ClientlogController@logoutClientlog')->name('cl_logout');

    Route::post('/clientlog/login','ClientlogController@authenticate')->name('clientlog.auth');
    Route::post('/clientlog/store','ClientlogController@store')->name('clientlog.store');
});

//Auth Area 2
Route::get('/login/sprovider', 'Auth\LoginController@showSproviderLoginForm');
Route::get('/login/clientlog', 'Auth\LoginController@showClientlogLoginForm');
Route::get('/login/stafflog', 'Auth\LoginController@showStafflogLoginForm');
Route::get('/register/sprovider', 'Auth\RegisterController@showSproviderRegisterForm');
Route::get('/register/clientlog', 'Auth\RegisterController@showClientlogRegisterForm');
Route::get('/register/stafflog', 'Auth\RegisterController@showStafflogRegisterForm');

Route::post('/login/sprovider', 'Auth\LoginController@sproviderLogin');
Route::post('/login/clientlog', 'Auth\LoginController@clientlogLogin');
Route::post('/login/stafflog', 'Auth\LoginController@stafflogLogin');
Route::post('/register/sprovider', 'Auth\RegisterController@createSprovider');
Route::post('/register/clientlog', 'Auth\RegisterController@createClientlog');
Route::post('/register/stafflog', 'Auth\RegisterController@createStafflog');

Route::view('/home', 'home')->middleware('auth');
Route::view('/sprovider', 'sprovider');
Route::view('/clientlog', 'clientlog');
Route::view('/stafflog', 'stafflog');

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
    return view('welcome');
});

Route::get('/venue', function () {
    return view('venue');
});


//Route::get('/api/v1/venue', 'VenueController@getVenues');
//Route::get('/api/v1/venue/{id}', 'VenueController@getVenueFromId');

//Route::post('/venue', 'VenueController@venuePost');


Route::get('/api/v1/venues', 'VenueController@index');
Route::get('/api/v1/venues/{id}', 'VenueController@show');
Route::post('/api/v1/venues', 'VenueController@store');
Route::put('/api/v1/venues/{id}', 'VenueController@update');
Route::destroy('/api/v1/venue/{id}', 'VenueController@delete');
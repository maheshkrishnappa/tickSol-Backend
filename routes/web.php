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
use \Illuminate\Support\Facades\Route as Route;

Route::get('/api/venues/view', 'VenueController@index');
Route::post('/api/venues/view', 'VenueController@store');
Route::put('/api/venues/view/{id}', 'VenueController@update');
Route::delete('/api/venues/view/{id}', 'VenueController@delete');
Route::get('/api/venues/view/{id}', 'VenueController@retrieve');

Route::get('/api/events', 'EventController@index');
Route::post('/api/events', 'EventController@store');
Route::put('/api/events/{id}', 'EventController@update');
Route::delete('/api/events/{id}', 'EventController@delete');
Route::get('/api/events/{id}', 'EventController@retrieve');

Route::get('/api/venues/{id}/events', 'EventVenueController@eventsForVenue');
Route::get('/api/events/{id}/venues', 'EventVenueController@venuesForEvent');
Route::get('/api/eventvenue', 'EventVenueController@getEventsVenues');
Route::get('/api/venues/events/calendar', 'EventVenueController@calendarDetails');

Route::get('/api/users', 'UserController@index');
Route::post('/api/register', 'RegisterController@register');
Route::put('/api/users/{id}', 'UserController@update');
Route::delete('/api/unregister/{id}', 'RegisterController@delete');
Route::get('/api/users/{id}', 'UserController@retrieve');

Route::get('/api/plugins', 'PluginController@index');
Route::post('/api/plugins', 'PluginController@create');
Route::put('/api/plugins/{id}', 'PluginController@update');
Route::get('/api/plugins/{id}', 'PluginController@retrieve');
Route::delete('/api/plugins/{id}', 'PluginController@delete');

Route::get('/api/settings', 'SettingsController@index');
Route::post('/api/settings', 'SettingsController@create');
Route::put('/api/settings/{id}', 'SettingsController@update');
Route::delete('/api/settings/{id}', 'SettingsController@delete');
Route::get('/api/settings/{id}', 'SettingsController@retrieve');
Route::get('/api/settings/users/{id}', 'SettingsController@retrieveFromUser');

Route::post('/api/login', 'LoginController@login');

Route::get('/api/dashboard', 'DashboardController@index');
Route::get('/api/dashboard/events', 'DashboardController@test');
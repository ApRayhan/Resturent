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

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reserve', 'ReservationController@index')->name('reserve');
Route::post('/contact', 'ContactController@index')->name('contact.us');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::resource('slider', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::get('reservation', 'ReservationController@index')->name('reservation');
	Route::post('reservation/{id}', 'ReservationController@reserve')->name('reservation.reserve');
	Route::delete('reservation/{id}', 'ReservationController@delete')->name('reservation.delete');
	Route::get('message', 'ContactController@index')->name('message.index');
	Route::get('show/{id}', 'ContactController@show')->name('message.show');
	Route::delete('delete/message/{id}', 'ContactController@delete')->name('message.delete');
});

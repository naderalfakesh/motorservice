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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::resource('/company', 'CompanyController');

Route::resource('/service/offer', 'serviceOffersController');

Route::get('/service/offer', 'serviceOffersController@index');

Route::get('/service/offer/create/{service}', 'serviceOffersController@create');

Route::get('/service/offer/index/{serviceId}', 'serviceOffersController@serviceOfferIndex');

Route::resource('/service', 'ServiceController');


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

Route::resource('/product' , 'productController');

Route::get('/service/offer/index/{serviceId}', 'serviceOffersController@serviceOfferIndex');

Route::get('/service/offer/create/{service}', 'serviceOffersController@create');

Route::resource('/service/offer', 'serviceOffersController');

Route::resource('/service/order', 'serviceOrdersController');

Route::resource('/service', 'ServiceController');

Route::apiResources([
    'api/product' => 'API\productController'
    // ,'posts' => 'ServiceController'
]);



// Route::resource([
//     '/company' => 'CompanyController',
//     '/product' => 'productController'
//     ]);
<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


Route::any('/', 'HomeController@index');
Route::any('/home', 'HomeController@index');
Route::get('/product/{id}', 'HomeController@view');
Route::post('/productitem/{id}', 'HomeController@getProductItems');
Route::post('/addItems', 'HomeController@addDataItems');
Route::get('/addproduct', function () {
    return View::make('/addpoduct');
});

Route::post('/addproduct', 'HomeController@addProduct');

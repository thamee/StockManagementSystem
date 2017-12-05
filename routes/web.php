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

Route::get('/ho', function () {
    return view('home/home');
});
//
//
//<?php

Route::get('/', 'IndexController@readItems');
Route::post('addItem', 'IndexController@addItem');
Route::post('editItem', 'IndexController@editItem');
Route::post('deleteItem', 'IndexController@deleteItem');

Route::get('/supplier', 'SupplierController@readItems');
Route::post('addItem', 'SupplierController@addItem');
Route::post('editItem', 'SupplierController@editItem');
Route::post('deleteItem', 'SupplierController@deleteItem');


Route::get('example', 'ExampleController@display');
Route::get('example/form', 'ExampleController@display');
Route::get('/stockin', 'StockinController@stockin');
Route::post('addStockin', 'StockinController@addStockin');

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
Route::post('supadd', 'SupplierController@supadd');
Route::post('supedit', 'SupplierController@supedit');
Route::post('supdelete', 'SupplierController@supdelete');


Route::get('/stockreturn', 'StockReturnController@readItems');
Route::post('stockadd', 'StockReturnController@stockadd');
Route::post('stockedit', 'StockReturnController@stockedit');
Route::post('stockdelete', 'StockReturnController@stockdelete');


Route::get('example', 'ExampleController@display');
Route::get('example/form', 'ExampleController@display');
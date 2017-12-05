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

Route::get('/home', function () {
    return view('home/home');
});
Route::get('/', 'ListController@show');
Route::get('/logout',function() {
    Auth::logout();
return redirect('/login');});
Route::auth();
Route::get('/home','HomeController@index');

Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function () {
        echo "You are allowed to view this page!";
    }]);



Route::get('/read', 'IndexController@readItems');
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


Route::get('/wastage', 'WastageController@readItems');
Route::post('wasadd', 'WastageController@wasadd');
Route::post('wasedit', 'WastageController@wasedit');
Route::post('wasdelete', 'WastageController@wasdelete');


Route::get('example', 'ExampleController@display');
Route::get('example/form', 'ExampleController@display');
Route::get('/stockin', 'StockinController@stockin');
Route::post('addStockin', 'StockinController@addStockin');
Route::get('/stock', 'stockController@stock');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

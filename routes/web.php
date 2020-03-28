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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@display')->name('categories');
Route::post('/category/create', 'CategoryController@store')->name('category.create');
Route::post('/category/destroy', 'CategoryController@destroy')->name('category.destroy');


Route::get('/products', 'ProductController@display')->name('products');
Route::post('/product/create', 'ProductController@store')->name('product.create');
Route::post('/product/destroy', 'ProductController@destroy')->name('product.destroy');
//Route::get('/items', 'ItemController@index')->name('items');

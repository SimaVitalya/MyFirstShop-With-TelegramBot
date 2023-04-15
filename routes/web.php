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
Route::get('/telegram', 'ExampleController@sendMessage');

Route::get('/main', 'MainController@index')->name('main.index');

Auth::routes();

Route::get('/basket', 'BasketController@basket')->name('basket.index');
Route::get('/basket/json', 'BasketController@basketJson')->name('basket.json');
Route::get('/basket/addd/{id}', 'BasketController@basketAddd')->name('basked-addd');

Route::get('/basket/remove/{id}', 'BasketController@basketRemove')->name('basked-remove');
Route::get('/basket/removeall/{id}', 'BasketController@basketRemoveAll')->name('basked-removeall');
Route::get('/order', 'BasketController@index')->name('order.index');
Route::post('/order/store', 'BasketController@store')->name('order.store');
Route::get('/order/show', 'BasketController@show')->name('order.show');


Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('admin')->group(function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('banners', 'BannerController');
    Route::resource('orders', 'OrderController');
});
Route::get('/user/orders','UserOrdersController@index')->name('user.orders.index');
Route::get('/user/orders{order}','UserOrdersController@show')->name('user.orders.show');


Route::get('/product/{productId}', 'ProductController@index')->name('product.show');
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{categories}', 'CategoryController@show')->name('categories.show');
Route::get('/categories', 'CategoryController@index')->name('categories.index');





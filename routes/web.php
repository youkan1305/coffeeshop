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
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('/', 'IndexController@welcome');

Route::get('accesses', 'IndexController@access')->name('access.index');
Route::get('methods', 'IndexController@method')->name('methods.index');
Route::get('products', 'IndexController@prodeuct')->name('products.index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('informations', 'InformationsController@index');
    Route::resource('informations', 'InformationsController');
    
    
    Route::get('news', 'NewsController@index');
    Route::resource('news', 'NewsController');
    
    Route::get('items', 'ItemsController@index');
    Route::resource('items', 'ItemsController');
    
    
    Route::post('orders/{id}', 'OrdersController@store')->name('orders.store');
    Route::resource('orders', 'OrdersController', ['only' => ['create', 'show', 'destroy']]);
    Route::get('orders', 'OrdersController@show')->name('orders.show');
    
    Route::get('carts', 'CartsController@show');
    Route::resource('carts', 'CartsController');
    
    
    
    

    Route::get('mypage', 'IndexController@mypage')->name('mypage.index');
    
    Route::get('delete/{id}', 'IndexController@delete')->name('mypages.delete');
    Route::get('manegeritem', 'IndexController@manegeritem')->name('mypage.item');
    Route::get('manegerinfo', 'IndexController@manegerinfo')->name('mypage.information');
    Route::get('manegernew', 'IndexController@manegernew')->name('mypage.news');
    
    
    
    Route::get('completepage', 'IndexController@completepage')->name('complete.page');
    
    //Route::get('cart', 'IndexController@cart')->name('cart.index');
    
    
    Route::get('mypages', 'MypageController@index');
    Route::resource('mypages', 'MypageController');
});




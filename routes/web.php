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

/*Route::get('/', function () {
    return view('layouts.main', ['title' => 'Найди своего художника']);
});*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/', 'MainController@index')->name('layouts.main');

Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');


Route::get('/painters', 'PainterController@index')->name('painters.index');

Route::get('/painters/{painter}', 'PainterController@index')->name('painters.show');





Route::group(['middleware' => ['auth']], function () {
    Route::get('/account/profile', function () {
        return view('account.profile', ['user' => Auth::user(), 'title' => 'Профиль']);
    })->name('account.profile');

    Route::get('/account/settings', function () {
        return view('account.settings', ['user' => Auth::user(), 'title' => 'Настройки аккаунта']);
    })->name('account.settings');

    Route::get('/account/orders', function () {
        return view('account.orders', ['user' => Auth::user(), 'title' => 'Заказы']);
    })->name('account.orders');

    Route::get('/account/messages', function () {
        return view('account.messages', ['user' => Auth::user(), 'title' => 'Сообщения']);
    })->name('account.messages');

    Route::get('/account/paintings', function () {
        return view('account.paintings', ['user' => Auth::user(), 'title' => 'Картины']);
    })->name('account.paintings');




    Route::get('/account/paintings/{id}/edit', 'ShopController@edit', function () {
        return view('account.paintings_edit', ['user' => Auth::user(), 'title' => 'Картины']);
    });

    Route::post('/account/paintings/{id}/update', 'ShopController@update')->name('account.paintings.update');





    Route::get('/account/auctions', function () {
        return view('account.auctions', ['user' => Auth::user(), 'title' => 'Аукционы']);
    })->name('account.auctions');

    Route::get('/account/favs', function () {
        return view('account.favs', ['user' => Auth::user(), 'title' => 'Избранное']);
    })->name('account.favs');
    
    Route::post('/account/profile', 'UserController@update')->name('user.update');
});







Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/filter', 'ShopController@filter')->name('filter');


Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('{slug}', 'PagesController@show');
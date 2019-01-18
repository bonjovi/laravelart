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
Route::post('/shop/{product}/showcontacts', 'ShopController@showcontacts')->name('shop.showcontacts');
Route::post('/shop/{product}/showcontacts_for_dealer', 'ShopController@showcontacts_for_dealer')->name('shop.showcontacts_for_dealer');

Route::get('/painters', 'PainterController@index')->name('painters.index');

Route::get('/painters/new', 'PainterController@new')->name('painters.new');
Route::get('/painters/asc', 'PainterController@asc')->name('painters.asc');
Route::get('/painters/popular', 'PainterController@popular')->name('painters.popular');

Route::get('/painters/{painter}', 'PainterController@show')->name('painters.show');

Route::get('/subscription', 'SubscriptionController@index')->name('subscription.index');
Route::post('/subscription', 'SubscriptionController@store')->name('subscription');










Route::group(['middleware' => ['auth']], function () {

    Route::get('/dealer', 'ShopController@index_dealer', function () {
        return view('dealer.shop', ['user' => Auth::user(), 'title' => 'Картины для дилеров']);
    })->name('dealer.index');

    Route::get('/dealer/{product}', 'ShopController@show_dealer', function () {
        return view('dealer.product', ['user' => Auth::user(), 'title' => 'Картины для дилеров']);
    })->name('dealer.show');

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


    Route::get('/account/paintings/add', 'ShopController@add', function () {
        return view('account.painting_add', ['user' => Auth::user(), 'title' => 'Картины'])->name('account.painting.add');
    });

    Route::post('/account/paintings/store', 'ShopController@store')->name('account.painting.store');

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
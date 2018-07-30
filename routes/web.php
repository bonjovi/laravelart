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

Route::get('/', 'MainController@index')->name('layouts.main');

Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');


Route::get('/painters', function () {
    return view('painters');
});

Route::get('/account', function () {
    return view('account', ['user' => Auth::user()]);
});

/*Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);*/





Route::get('/home', 'HomeController@index')->name('home');




Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');











Route::get('/about', function () {
    return view('simplepage', [
        'title' => 'О проекте',
        'content' => '
            <p class="text text_content"><strong>ArtMarket24</strong> - это современная интернет-площадка, где продавцы и покупатели произведений искусства находят друг друга. На нашем портале размещено более 2000 работ и каждый день эта коллекция активно пополняется!</p>
            <p class="text text_content">В <strong>ArtMarket24</strong> мы строим мир, в котором художники могут зарабатывать на жизнь, занимаясь любимым делом. Где каждый может легко найти и купить современные оригинальные произведения искусства, независимо от его вкуса или бюджета. Являетесь ли вы любителем искусства или профессионалом в этой области, мы напрямую соединяем вас с независимыми художниками по всей России.  Каждая работа оригинальна и подписана художником, несущим свою собственную уникальную историю.</p>
        '
    ]);
});

Route::get('/faq', function () {
    return view('simplepage', [
        'title' => 'FAQ',
        'content' => '
            <h3 class="title">Вопрос 1</h3>
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <h3 class="title">Вопрос 2</h3>
            <p class="text text_content">Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <h3 class="title">Вопрос 3</h3>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/personal', function () {
    return view('simplepage', [
        'title' => 'Персональные данные',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});


Route::get('/sitemap', function () {
    return view('simplepage', [
        'title' => 'Карта сайта',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/delivery', function () {
    return view('simplepage', [
        'title' => 'Доставка',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/payment', function () {
    return view('simplepage', [
        'title' => 'Способы оплаты',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/guarantees', function () {
    return view('simplepage', [
        'title' => 'Гарантии',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/support', function () {
    return view('simplepage', [
        'title' => 'Поддержка',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/why', function () {
    return view('simplepage', [
        'title' => 'Почему именно АртМаркет24',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});

Route::get('/rules', function () {
    return view('simplepage', [
        'title' => 'Правила и условия',
        'content' => '
            <p class="text text_content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
            <p class="text text_content">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. Page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>
        '
    ]);
});
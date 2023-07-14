<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\MovieClient@index')->name('index.client');
Route::get('/movie/{id}', 'App\Http\Controllers\MovieClient@detail')->name('detail.client');
Route::get('/category/{id}', 'App\Http\Controllers\CategoryClient@index')->name('category');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\MovieAdmin@dashboard')->name('dashboard');

    Route::get('/movie', 'App\Http\Controllers\MovieAdmin@index')->name('movie');
    Route::get('/movie/create', 'App\Http\Controllers\MovieAdmin@create')->name('movie.create');
    Route::post('/movie/create', 'App\Http\Controllers\MovieAdmin@store')->name('movie.create.post');
    Route::get('/movie/edit/{id}', 'App\Http\Controllers\MovieAdmin@edit')->name('movie.edit');
    Route::put('/movie/edit/{id}', 'App\Http\Controllers\MovieAdmin@update')->name('movie.edit.post');
    Route::delete('/movie/delete/{id}', 'App\Http\Controllers\MovieAdmin@delete')->name('movie.delete');

    Route::get('/balance', 'App\Http\Controllers\BalanceAdmin@index')->name('balance');
    Route::get('/balance/create', 'App\Http\Controllers\BalanceAdmin@create')->name('balance.create');
    Route::post('/balance/create', 'App\Http\Controllers\BalanceAdmin@store')->name('balance.create.post');
    Route::get('/balance/edit/{id}', 'App\Http\Controllers\BalanceAdmin@edit')->name('balance.edit');
    Route::put('/balance/edit/{id}', 'App\Http\Controllers\BalanceAdmin@update')->name('balance.edit.post');
    Route::delete('/balance/delete/{id}', 'App\Http\Controllers\BalanceAdmin@delete')->name('balance.delete');

    Route::get('/transaksi', 'App\Http\Controllers\TransactionAdmin@index')->name('transaction');
    Route::get('/transaksi/create', 'App\Http\Controllers\TransactionAdmin@create')->name('transaction.create');
    Route::post('/transaksi/create', 'App\Http\Controllers\TransactionAdmin@store')->name('transaction.create.post');
    Route::get('/transaksi/edit/{id}', 'App\Http\Controllers\TransactionAdmin@edit')->name('transaction.edit');
    Route::put('/transaksi/edit/{id}', 'App\Http\Controllers\TransactionAdmin@update')->name('transaction.edit.post');
    Route::delete('/transaksi/delete/{id}', 'App\Http\Controllers\TransactionAdmin@delete')->name('transaction.delete');
});

Route::get('/topup', 'App\Http\Controllers\BalanceClient@index')->name('topup');
Route::post('/topup', 'App\Http\Controllers\BalanceClient@prosesTopup')->name('topup.post');

Route::get('/cart', 'App\Http\Controllers\CartClient@index')->name('cart');
Route::get('/checkout', 'App\Http\Controllers\CartClient@checkout')->name('checkout');
Route::delete('/cart/{id}', 'App\Http\Controllers\CartClient@deleteCartItem')->name('cart.destroy');

Route::get('/ticket', 'App\Http\Controllers\TransactionClient@index')->name('historyTicket');
Route::get('/ticket/show', 'App\Http\Controllers\TransactionClient@show')->name('ticket');

Route::get('/login', 'App\Http\Controllers\AuthClient@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthClient@prosesLogin')->name('login.post');
Route::get('/register', 'App\Http\Controllers\AuthClient@register')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthClient@registerProses')->name('register.post');

Route::get('/logout',  'App\Http\Controllers\AuthClient@logout')->name('logout')->middleware('auth');
Route::post('/movie/add-to-cart/{movie}', 'App\Http\Controllers\CartClient@addToCart')->name('movie.addToCart');

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/kategori', 'KategoriController')->except([
        'show'
    ]);
    Route::resource('/lokasi', 'LokasiController')->except([
        'show'
    ]);
    Route::resource('/merek', 'MerekController')->except([
        'show'
    ]);
    Route::resource('/produk', 'ProdukController');
    Route::get('/home', 'HomeController@index')->name('home');
});







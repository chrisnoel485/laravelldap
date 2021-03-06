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
Route::get('/', function() {
    return redirect(route('login'));
});
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    
    //Route yang berada dalam group ini hanya dapat diakses oleh user
    //yang memiliki role admin
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/role', 'RoleController')->except([
            'show', 'edit', 'update'
        ]);
        
        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::resource('/kategori', 'KategoriController')->except([
            'show'
        ]);
        Route::resource('/lokasi', 'LokasiController')->except([
            'show'
        ]);
        Route::resource('/merek', 'MerekController')->except([
            'show'
        ]);
        Route::get('mereks/export/', 'MereksController@export');
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
    });

    Route::group(['middleware' => ['role:admin server']], function () {
        //route yang berada dalam group ini, hanya bisa diakses oleh user
        //yang memiliki permission yang telah disebutkan dibawah
        //Route::group(['middleware' => ['permission:server']], function() {
            Route::resource('/server', 'ServerController');
        //});
    });
    
    
    //home kita taruh diluar group karena semua jenis user yg login bisa mengaksesnya
    Route::get('/home', 'HomeController@index')->name('home');
});
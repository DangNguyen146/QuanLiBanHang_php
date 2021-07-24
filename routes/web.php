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

/*
Tích hợp giao diện login
-- Code logic khi post submit form
*/

Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@postloginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'CategoryController@index'
        ]);
        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'CategoryController@create'
        ]);
        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'CategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'CategoryController@delete'
        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'menus.index',
            'uses'=>'MenuController@index'
        ]);
        Route::get('/create', [
            'as'=>'menus.create',
            'uses'=>'MenuController@create'
        ]);
        Route::post('/store', [
            'as'=>'menus.store',
            'uses'=>'MenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as'=>'menus.edit',
            'uses'=>'MenuController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'=>'menus.update',
            'uses'=>'MenuController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'=>'menus.delete',
            'uses'=>'MenuController@delete'
        ]);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as'=>'product.index',
            'uses'=>'AdminProductController@index'
        ]);
        Route::get('/create', [
            'as'=>'product.create',
            'uses'=>'AdminProductController@create'
        ]);
        Route::post('/store', [
            'as'=>'product.store',
            'uses'=>'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'=>'product.edit',
            'uses'=>'AdminProductController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'=>'product.update',
            'uses'=>'AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'=>'product.delete',
            'uses'=>'AdminProductController@delete'
        ]);
    });
});


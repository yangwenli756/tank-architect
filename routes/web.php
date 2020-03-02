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

Route::get('/', function () {
    return view('welcome');
});

//good表的增删改查
Route::prefix('goods')->group(function(){
	Route::get('create','GoodsController@create');
	Route::post('store','GoodsController@store');
	Route::get('index','GoodsController@index');
	Route::get('edit/{id}','GoodsController@edit');
	Route::post('update/{id}','GoodsController@update');
	Route::get('destroy/{id}','GoodsController@destroy');
});

//品牌
Route::get('/brand/insert','Index\BrandController@create');
Route::post('/brand/store','Index\BrandController@store');
Route::get('/brand/index','Index\BrandController@index');
Route::get('/brand/destroy/{id}','Index\BrandController@destroy');
Route::get('/brand/edit/{id}','Index\BrandController@edit');
Route::post('/brand/update/{id}','Index\BrandController@update');


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
//品牌
Route::get('/brand/insert','Index\BrandController@create');
Route::post('/brand/store','Index\BrandController@store');
Route::get('/brand/index','Index\BrandController@index');
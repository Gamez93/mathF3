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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
=======

//Route::get('/hoja', 'HomeController@hoja')->name('hoja');
Route::view('/hoja','/hojas/hoja')->name('hoja');

Route::view('/multimedia','/multimedia/multimedia')->name('multimedia');
>>>>>>> a27f707eaedc78d8e9576770cfb6f7f5e730ba02

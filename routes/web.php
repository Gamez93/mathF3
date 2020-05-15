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

Route::get('/home', 'MateriaController@index')->name('home');

//Route::get('/hoja', 'HomeController@hoja')->name('hoja');
Route::view('/hoja','/hojas/hoja')->name('hoja');

Route::view('/multimedia','/multimedia/multimedia')->name('multimedia');

Route::resource('/materia','MateriaController');

Route::post('updateFromRB','MateriaController@updateFromRB');

//Bibliografia
  //listado
  Route::get('/bibliografia','BibliografiaController@index')->name('bibliografia');

  //ir a Formulario Crear
  Route::get('/bibliografia/create','BibliografiaController@create')->name('bibliografia.create');

  //Guardar Formulario Crear
  Route::post('/bibliografia/store','BibliografiaController@store')->name('bibliografia.store');

  //ir a Formulario Editar
  Route::get('/bibliografia/{bibliografia}/edit','BibliografiaController@edit')->name('bibliografia.edit');

  //Update a la bibliografia
  Route::put('bibliografia/{id}','BibliografiaController@update');

  //Eliminar Bibliografia
  Route::delete('/bibliografia/{id}','BibliografiaController@destroy')->name('bibliografia.destroy');














//...

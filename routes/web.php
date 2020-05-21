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

//__________________________________________________________________________________________________________
//Rutas de autenticacion manejadas por laravel
Auth::routes();

//__________________________________________________________________________________________________________
//Home - Inicio de la app
Route::get('/home', 'HomeController@index')->name('home');

//__________________________________________________________________________________________________________
//Clases
Route::view('/hoja','/hojas/hoja')->name('hoja');

//__________________________________________________________________________________________________________
//Multimedia
Route::view('/multimedia','/multimedia/multimedia')->name('multimedia');

//__________________________________________________________________________________________________________
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

  //lista de bibliografias por filtro //
  Route::get('/bibliografia/{id}/editList','BibliografiaController@editList')->name('bibliografia.editList');

  //list bibliografia Cancelar
  Route::get('/bibliografia/cancel','BibliografiaController@cancel')->name('bibliografia.cancel');

//__________________________________________________________________________________________________________
//Materia
  //listado
  Route::get('/materia','MateriaController@index')->name('materia');

  //ir a Formulario Crear
  Route::get('/materia/create','MateriaController@create')->name('materia.create');

  //Guardar Formulario Crear
  Route::post('/materia/store','MateriaController@store')->name('materia.store');

  //ir a Formulario Editar
  Route::get('/materia/{materia}/edit','MateriaController@edit')->name('materia.edit');

  //Update a Materia
  Route::put('materia/{id}','MateriaController@update');

  //Eliminar Materia
  Route::delete('/materia/{id}','MateriaController@destroy')->name('materia.destroy');
//__________________________________________________________________________________________________________
//Unidad
  //index
  Route::get('/unidad','UnidadController@index')->name('unidad');

  //ir a Formulario Crear
  Route::get('/unidad/create','UnidadController@create')->name('unidad.create');

  //Guardar Formulario Crear
  Route::post('/unidad/store','UnidadController@store')->name('unidad.store');

  //ir a Formulario Editar
  Route::get('/unidad/{unidad}/edit','UnidadController@edit')->name('unidad.edit');

  //Update a Materia
  Route::put('unidad/{id}','UnidadController@update');

  //Eliminar Materia
  Route::delete('/unidad/{id}','UnidadController@destroy')->name('unidad.destroy');

//__________________________________________________________________________________________________________
//Video
  //index
  Route::get('/video','VideoController@index')->name('video');

  //index Video
  Route::get('/indexvideo/{id}/index','VideoController@indexvideo')->name('indexvideo');

  //ir a Formulario Crear
  Route::get('/video/create','VideoController@create')->name('video.create');

//__________________________________________________________________________________________________________
//













//...

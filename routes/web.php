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
  //index
  Route::get('/clase','ClaseController@index')->name('clase');

  //Eliminar Clase
  Route::delete('/clase/{id}','ClaseController@destroy')->name('clase.destroy');

  //Guardar nueva clase
  Route::post('/clase/store','ClaseController@store')->name('clase.store');

  //Upload File
  Route::post('/clase/upload','ClaseController@uploadFile')->name('clase.upload');

  //Cargar Clases
  Route::get('/clase/{id}/show','ClaseController@show')->name('clase.show');

  Route::post('ajaxshow','ClaseController@show2');

  //Update o Guardar clase
  Route::put('/clase/{id}','ClaseController@update');

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

  //listado
  Route::get('/bibliografia/show','BibliografiaController@show')->name('bibliografia.show');

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

  //Guardar Formulario Crear
  Route::post('/video/store','VideoController@store')->name('video.store');

  //ir a Formulario Editar
  Route::get('/video/{video}/edit','VideoController@edit')->name('video.edit');

  //Update a Materia
  Route::put('video/{id}','VideoController@update');

  //Eliminar video
  Route::delete('/video/{id}','VideoController@destroy')->name('video.destroy');

//__________________________________________________________________________________________________________
//Multimedia
  //ir a index de Unidades + Videos
  Route::get('/multimedia/{id}/index','MultimediaController@index')->name('multimedia.index');

  //listado show para usuarios NO admin
  Route::get('/multimedia/{opcion}/showlist','MultimediaController@showlist')->name('multimedia.showlist');

  //ir a Vista show de programa Materia
  Route::get('/multimedia/{idMateria}/showprograma','MultimediaController@showprograma')->name('multimedia.showprograma');

  //ir a Vista show de videos
  Route::get('/multimedia/{idMateria}/showvideo','MultimediaController@showvideo')->name('multimedia.showvideo');

  //ir a Vista show de bibliografia
  Route::get('/multimedia/{idMateria}/showbiblio','MultimediaController@showbiblio')->name('multimedia.showbiblio');













//...

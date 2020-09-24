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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Usuarios
*/

Route::get('/usuarios', 'UserController@index');                  /* Listo */
Route::get('/usuarios/crear', 'UserController@createView');       /* Listo */
Route::post('/usuarios/crear', 'UserController@create');          /* Listo */
Route::get('/usuarios/eliminar/{id}', 'UserController@delete');   /* Listo */
Route::get('/usuarios/editar/{id}', 'UserController@updateView'); /* Listo */
Route::post('/usuarios/actualizar', 'UserController@postUpdate'); /* Listo */

/*
Documentos
*/

Route::get('/documentos', 'DocumentoController@index');                  /* Listo */
Route::get('/documentos/crear', 'DocumentoController@createView');       /* Listo */
Route::post('/documentos/crear', 'DocumentoController@create');          /* Listo */
Route::get('/documentos/eliminar/{id}', 'DocumentoController@delete');   /* Listo */
Route::get('/documentos/editar/{id}', 'DocumentoController@updateView'); /* Listo */
Route::post('/documentos/actualizar', 'DocumentoController@postUpdate'); /* Listo */
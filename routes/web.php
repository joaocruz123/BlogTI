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

Route::get('/', 'BlogController@index');
Route::get('/post/{id}', 'BlogController@post');
Route::post('/post/{id}', 'BlogController@comentario');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::resource('artigos', 'ArtigoController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('comentarios', 'ComentarioController');
});
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
    return view('home');
});

Route::get('Lista',function(){
    return view('ListaMejorada');
});


// Route::group(['prefix' => 'Cliente'], function () {
//     Route::get('index','ClienteController@index')->name('Cliente.index')->middleware(['auth','roles:Admin']);
//     Route::get('create','ClienteController@create')->name('Cliente.create')->middleware(['auth','roles:Admin']);
//     Route::post('store','ClienteController@store')->name('Cliente.store')->middleware([]);
// });


Route::resource('Cliente', 'ClienteController');

Route::resource('Administrador', 'AdministradorController')->middleware(['auth','roles:Cliente,Admin']);

Route::resource('Actor', 'ActorController');

Route::resource('Director', 'DirectorController');

Route::resource('Pelicula', 'PeliculaController');

Route::resource('Carrito', 'CarritoController');

Route::post('comentario/{Id_Pelicula}','ComentarioController@store')->name('Comentario.store');

// DETALLE CARRITO


// Route::get('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit','DetallecarritoController@edit')->name('Detallecarrito.edit');
Route::get('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit',['as'
=>'Detallecarrito.edit','uses'=>'DetallecarritoController@edit']);

Route::Post('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}',['as'
=>'Detallecarrito.store','uses'=>'DetallecarritoController@store']);

Route::PUT('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit',['as'
=>'Detallecarrito.update','uses'=>'DetallecarritoController@update']);

Route::DELETE('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/destroy',['as'
=>'Detallecarrito.destroy','uses'=>'DetallecarritoController@destroy']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




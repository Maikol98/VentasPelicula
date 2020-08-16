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

Route::get('/', 'PeliculaController@lista');



//RUTAS PARA INGRESO
Route::resource('Ingreso', 'IngresoController');

//RUTAS PARA DETALLEINGRESO
Route::get('DetalleIngreso/{Id}','DetalleingresoController@create')->name('Detalleingreso.create');
Route::get('Detalleingreso/{IdIngreso}/{IdPelicula}/edit','DetalleingresoController@edit')->name('Detalleingreso.edit');
Route::post('DetalleIngreso/{Id}','DetalleingresoController@store')->name('Detalleingreso.store');
Route::put('Detalleingreso/{IdIngreso}/{IdPelicula}','DetalleingresoController@update')->name('Detalleingreso.update');
Route::delete('Detalleingreso/{IdIngreso}/{IdPelicula}','DetalleingresoController@destroy')->name('Detalleingreso.destroy');

//PEDIDOS
route::get('Pedido','PedidoController@index')->name('Pedido.index');
route::get('Pedido/create','PedidoController@create')->name('Pedido.create');
route::post('Pedido','PedidoController@store')->name('Pedido.store');
route::get('Pedido/{id}','PedidoController@show')->name('Pedido.show');

//PAGOS
route::get('Pago','PagoController@index')->name('Pago.index');
route::get('Pago/{Id}','PagoController@create')->name('Pago.create');
route::post('Pago/{Id}','PagoController@store')->name('Pago.store');
route::post('Pago/{Id}/Efectivo','PagoController@efectivo')->name('Pago.efectivo');

//DETALLE PEDIDO
route::get('Detalle/{id}','DetallepedidoController@index')->name('Detallepedido.index');
route::post('Detalle/{id_Pelicula}/{id_Pedido}','DetallepedidoController@store')->name('Detallepedido.store');
route::delete('Detalle/{id_Pelicula}/{id_Pedido}','DetallepedidoController@destroy')->name('Detallepedido.destroy');

//CLIENTE
route::get('Cliente','ClienteController@index')->name('Cliente.index');
route::get('Cliente/create','ClienteController@create')->name('Cliente.create');
route::post('Cliente','ClienteController@store')->name('Cliente.store');
route::get('Cliente/{id}/edit','ClienteController@edit')->name('Cliente.edit');
route::put('Cliente/{id}','ClienteController@update')->name('Cliente.update');
route::delete('Cliente/{id}','ClienteController@destroy')->name('Cliente.destroy');

// ->middleware(['auth','roles:Cliente,Admin'])
//ADMINISTRADOR
route::get('Administrador','AdministradorController@index')->name('Administrador.index');
route::get('Administrador/create','AdministradorController@create')->name('Administrador.create');
route::post('Administrador','AdministradorController@store')->name('Administrador.store');
route::get('Administrador/{id}/edit','AdministradorController@edit')->name('Administrador.edit');
route::put('Administrador/{id}','AdministradorController@update')->name('Administrador.update');
route::delete('Administrador/{id}','AdministradorController@destroy')->name('Administrador.destroy');

//ACTOR
route::get('Actor','ActorController@index')->name('Actor.index');
route::get('Actor/create','ActorController@create')->name('Actor.create');
route::post('Actor','ActorController@store')->name('Actor.store');
route::get('Actor/{id}/edit','ActorController@edit')->name('Actor.edit');
route::put('Actor/{id}','ActorController@update')->name('Actor.update');
route::delete('Actor/{id}','ActorController@destroy')->name('Actor.destroy');

//DIRECTOR
Route::resource('Director', 'DirectorController');
route::get('Actores','PeliculaactorController@create')->name('ActorPelicula.create');
route::post('Actores','PeliculaactorController@store')->name('Actor.insert');


//PELICULA
route::get('Pelicula','PeliculaController@index')->name('Pelicula.index');
route::get('Pelicula/create','PeliculaController@create')->name('Pelicula.create');
route::post('Pelicula','PeliculaController@store')->name('Pelicula.store');
route::get('Pelicula/{id}/edit','PeliculaController@edit')->name('Pelicula.edit');
route::put('Pelicula/{id}','PeliculaController@update')->name('Pelicula.update');
route::delete('Pelicula/{id}','PeliculaController@destroy')->name('Pelicula.destroy');
route::get('Pelicula/{id}/show','PeliculaController@show')->name('Pelicula.show');


//CARRITO
route::get('Carrito','CarritoController@index')->name('Carrito.index');
route::get('Carrito/create','CarritoController@create')->name('Carrito.create');
route::post('Carrito','CarritoController@store')->name('Carrito.store');
route::delete('Carrito/{id}','CarritoController@destroy')->name('Carrito.destroy');


Route::post('comentario/{Id_Pelicula}','ComentarioController@store')->name('Comentario.store');


// DETALLE CARRITO

route::get('DetalleCarrito/{id}','DetallecarritoController@index')
    ->name('Detallecarrito.index');

Route::get('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit','DetallecarritoController@edit')
    ->name('Detallecarrito.edit');

Route::post('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}','DetallecarritoController@store')
    ->name('Detallecarrito.store');

Route::put('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}','DetallecarritoController@update')
    ->name('Detallecarrito.update');

Route::delete('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}','DetallecarritoController@destroy')
    ->name('Detallecarrito.destroy');

//BITACORA
Route::get('Bitacora/{tipo}','bitacoraController@Bitacora')->name('Bitacora.index');

Route::get('ReporteIngreso',['as'=>'Reporte.ingreso','uses'=>'reporteController@ReporteIngreso']);
Route::get('ReportePedido',['as'=>'Reporte.pedidos','uses'=>'ReporteController@ReportePedido']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




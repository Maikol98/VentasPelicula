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



Route::resource('Cliente', 'ClienteController');

// ->middleware(['auth','roles:Cliente,Admin'])
Route::resource('Administrador', 'AdministradorController');

Route::resource('Actor', 'ActorController');

Route::resource('Director', 'DirectorController');

Route::resource('Pelicula', 'PeliculaController');

Route::resource('Carrito', 'CarritoController');

Route::post('comentario/{Id_Pelicula}','ComentarioController@store')->name('Comentario.store');


// DETALLE CARRITO

Route::get('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit','DetallecarritoController@edit')
    ->name('Detallecarrito.edit');

// Route::get('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit',['as'
// =>'Detallecarrito.edit','uses'=>'DetallecarritoController@edit']);

Route::Post('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}',['as'
=>'Detallecarrito.store','uses'=>'DetallecarritoController@store']);

Route::PUT('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/edit',['as'
=>'Detallecarrito.update','uses'=>'DetallecarritoController@update']);

Route::DELETE('DetalleCarrito/{Id_Carrito}/{Id_Pelicula}/destroy',['as'
=>'Detallecarrito.destroy','uses'=>'DetallecarritoController@destroy']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




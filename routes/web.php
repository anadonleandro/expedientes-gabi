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
    return view('auth/login');
});

Route::resource('archivo/expediente','ExpedienteController');
Route::resource('archivo/movimiento','MovimientoController');
Route::resource('archivo/cliente','ClienteController');
Route::resource('archivo/usuario','UsuarioController');
Route::resource('archivo/cita','CitaController');
Route::get('/exportExc', 'ExcelController@excel');
Route::get('/inactivo', 'ExpedienteInacticoController@index');

Route::get('/registrar', function () {
    return view('/registrar');
});
Route::get('/consulta', function () {
    return view('/consulta');
});
Route::get('/consulta2', function () {
    return view('/consulta2');
});
Route::get('/consulta3', function () {
    return view('/consulta3');
});
Route::get('/consulta4', function () {
    return view('/consulta4');
});
Route::get('/consulta5', function () {
    return view('/consulta5');
});
Route::get('/consulta6', function () {
    return view('/consulta6');
});
Route::get('/consulta7', function () {
    return view('/consulta7');
});
Route::get('/consulta8', function () {
    return view('/consulta8');
});
Route::get('/fecha', function () {
    return view('/fecha');
});


Route::get('resultado/{expediente?}', ['as' => 'resultado', 'uses' => 'ConsultaExpedienteController@consulta']); 
Route::get('fecharesultado/{expediente?}', ['as' => 'fecharesultado', 'uses' => 'ConsultaExpedienteController@fecha']);

Route::get('/fecharesultado', function () {
    return view('/fecharesultado');
});

//LISTADOS EN PDF

Route::get('mvto/{id}', 'MovimientoController@reportec');
Route::get('cliente/{id}', 'ClienteController@reportec');
Route::get('expte/{id}', 'ExpedienteController@reportec');
Route::get('expteinac/{id}', 'ExpedienteInacticoController@reportec');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


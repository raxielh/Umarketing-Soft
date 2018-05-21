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
    return redirect('/login');
});

Auth::routes();

Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/home', 'HomeController@index');

Route::resource('roles', 'RolesController');

Route::resource('usuariosRols', 'UsuariosRolController');

Route::resource('usuarios', 'UsuariosController');

Route::resource('estados', 'EstadosController');

Route::resource('tipoConceptos', 'TipoConceptosController');

Route::resource('permisos', 'PermisosController');

Route::resource('tipoIdentificacions', 'TipoIdentificacionController');

Route::resource('personas', 'PersonasController');


Route::resource('campuses', 'CampusController');

Route::resource('decanaturas', 'DecanaturasController');

Route::resource('decanaturas', 'DecanaturasController');
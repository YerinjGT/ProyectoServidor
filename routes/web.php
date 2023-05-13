<?php

use Illuminate\Support\Facades\Route;

//se agregan los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\ProyectoColaboradorController;

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
    return view('auth.login');
});

Route::get('menu', function () {
    return view('carreras.menucarreras');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('alumnos', AlumnosController::class);
    Route::resource('colaboradores', ColaboradoresController::class);
    Route::resource('proyectos', ProyectosController::class);
    Route::resource('proyecto-colaborador', ProyectoColaboradorController::class);
    Route::get('/editarProyecto', 'ProyectosController@edit');

    Route::get(
        'colaboradores-carrera/{id}',
        [
            'as' => 'colaboradores-carrera',
            'uses' => 'App\Http\Controllers\ColaboradoresController@verCarreraColab'
        ]
    );

    Route::get(
        'colaboradores-tipo/{id}',
        [
            'as' => 'colaboradores-tipo',
            'uses' => 'App\Http\Controllers\ColaboradoresController@verTipoColab'
        ]
    );
    Route::get(
        'proyectos-carrera/{id}',
        [
            'as' => 'proyectos-carrera',
            'uses' => 'App\Http\Controllers\ProyectosController@verCarrera'
        ]
    );

    Route::post(
        'filtroProyecto',
        [
            'as' => 'filtroProyecto',
            'uses' => 'App\Http\Controllers\ProyectosController@searchTable'
        ]
    );

    Route::post(
        'filtroColaborador',
        [
            'as' => 'filtroColaborador',
            'uses' => 'App\Http\Controllers\ColaboradoresController@searchTable'
        ]
    );

    Route::post(
        'editarestado/{id}',
        [
            'as' => 'editarestado',
            'uses' => 'App\Http\Controllers\ProyectosController@updateEstado'
        ]
    );


    Route::name('download')->get('/download/{id}', 'App\Http\Controllers\ProyectoColaboradorController@printPDF');
});

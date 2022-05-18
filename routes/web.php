<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PersonaController;

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

Route::resource('persona', 'App\http\Controllers\PersonaController');
Route::resource('estudiante', 'App\http\Controllers\EstudianteController');
Route::resource('acudiente', 'App\http\Controllers\AcudienteController');

Route::get('imprimirPersonas','App\http\Controllers\PdfController@imprimirPersonas')->name('imprimirPersonas');
Route::get('imprimirEstudiantes','App\http\Controllers\PdfController@imprimirEstudiantes')->name('imprimirEstudiantes');

Route::resource('asignaciond','App\http\Controllers\AsignaciondocenteController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

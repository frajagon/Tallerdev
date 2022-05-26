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
    return view('home');
})->middleware('auth');

Route::resource('persona', 'App\http\Controllers\PersonaController')->middleware('auth');
Route::resource('estudiante', 'App\http\Controllers\EstudianteController')->middleware('auth');
Route::resource('acudiente', 'App\http\Controllers\AcudienteController')->middleware('auth');
Route::resource('docente', 'App\http\Controllers\DocenteController')->middleware('auth');
Route::resource('gradoacademico', 'App\http\Controllers\GradoAcademicoController')->middleware('auth');
Route::resource('grupo', 'App\http\Controllers\GrupoController')->middleware('auth');
Route::resource('gradoacademicoperiodo', 'App\http\Controllers\GradoAcademicoPeriodoController')->middleware('auth');

Route::get('imprimirPersonas','App\http\Controllers\PdfController@imprimirPersonas')->name('imprimirPersonas');
Route::get('imprimirEstudiantes','App\http\Controllers\PdfController@imprimirEstudiantes')->name('imprimirEstudiantes');
Route::get('imprimirAcudientes','App\http\Controllers\PdfController@imprimirAcudientes')->name('imprimirAcudientes');
Route::get('imprimirDocentes','App\http\Controllers\PdfController@imprimirDocentes')->name('imprimirDocentes');

Route::resource('asignaciond','App\http\Controllers\AsignaciondocenteController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

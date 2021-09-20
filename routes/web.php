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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login')->name('login.login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/dashboard', function () {
    return view('index', [
        'user_login' => \Illuminate\Support\Facades\Auth::user()
    ]);
})->name('index');

Route::resource('atendimentos', 'AtendimentosController')
    ->names('atendimento')->parameters(['atendimentos' => 'atendimento']);

Route::resource('usuarios', 'UserController')
    ->names('user')->parameters(['usuarios' => 'user']);

Route::resource('medicos', 'MedicosController')
    ->names('medico')->parameters(['medicos' => 'medico']);

Route::resource('pacientes', 'PacientesController')
    ->names('paciente')->parameters(['pacientes' => 'paciente']);

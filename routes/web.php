<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/pacientes', function () {
    return view('pacientes');
})->name('pacientes');

Route::get('/prueba-modal', function () {
    return view('prueba');
});
Route::get('/seguimiento', function () {
    return view('seguimiento');
})->name('seguimiento');

Route::get('/login', function () {
    return view('login');
    
})->name('login'); 

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

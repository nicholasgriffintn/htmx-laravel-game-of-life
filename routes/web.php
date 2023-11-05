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

Route::get('/',  [\App\Http\Controllers\Controller::class, 'index']);
Route::get('/toggle',  [\App\Http\Controllers\Controller::class, 'toggle'])->name('toggle');
Route::get('/next',  [\App\Http\Controllers\Controller::class, 'next'])->name('next');
Route::get('/rand',  [\App\Http\Controllers\Controller::class, 'randomize'])->name('rand');
Route::get('/reset',  [\App\Http\Controllers\Controller::class, 'reset'])->name('reset');

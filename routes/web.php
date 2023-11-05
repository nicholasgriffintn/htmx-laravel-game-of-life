<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::post('/toggle',  [\App\Http\Controllers\Controller::class, 'toggle'])->name('toggle');
Route::post('/next',  [\App\Http\Controllers\Controller::class, 'next'])->name('next');
Route::post('/rand',  [\App\Http\Controllers\Controller::class, 'randomize'])->name('rand');
Route::post('/reset',  [\App\Http\Controllers\Controller::class, 'reset'])->name('reset');
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;

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
    return view('welcome');
});

Route::get('/listen', [HomeController::class, 'index']);
Route::get('/listen2', [HomeController::class, 'index2']);
Route::get('/listen3', [HomeController::class, 'index3']);

Route::get('/', [DomainController::class, 'index'])->name('domains.index');
Route::get('domains', [DomainController::class, 'index'])->name('domains.index');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');

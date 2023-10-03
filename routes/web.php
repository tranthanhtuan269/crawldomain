<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\FilterController;

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


Route::get('/', [DomainController::class, 'index']);

Route::get('/listen', [HomeController::class, 'index']);
Route::get('/listen2', [HomeController::class, 'index2']);
Route::get('/listen3', [HomeController::class, 'index3']);

Route::resource('domains', DomainController::class);
Route::resource('filters', FilterController::class);
Route::get('domains', [DomainController::class, 'index'])->name('domains.index');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('/test2', [DomainController::class, 'test'])->name('domain.test');
Route::get('/remove', [DomainController::class, 'removeDupplicateDomain'])->name('domain.removeDupplicateDomain');

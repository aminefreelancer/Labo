<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LaboController;
use App\Http\Controllers\ResultController;

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

Route::get('/', [ResultController::class, 'index'])->name('home');

Route::get('/result/{code}', [ResultController::class, 'show'])->name('result');
Route::post('/result', [ResultController::class, 'get'])->name('getResult');

Route::get('/dashboard', [LaboController::class, 'show' ])->middleware(['auth'])->name('dashboard');
Route::put('/dashboard', [LaboController::class, 'updateExpired'])->name('updateExpired');

Route::get('/about', [LaboController::class, 'index'])->name('about');
Route::put('/about', [LaboController::class, 'update'])->name('updateLabo');

Route::get('/import', [LaboController::class, 'create'])->name('import');
Route::post('/import', [LaboController::class, 'store'])->name('upload');

Route::delete('/destroy', [LaboController::class, 'destroy'])->name('destroy');
Route::delete('/destroy-all', [LaboController::class, 'destroyAll'])->name('destroyAll');
Route::delete('/destroy-expired', [LaboController::class, 'destroyExpired'])->name('destroyExpired');

require __DIR__.'/auth.php';

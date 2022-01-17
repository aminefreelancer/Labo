<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/about', [LaboController::class, 'index'])->name('about');
Route::put('/about', [LaboController::class, 'update'])->name('updateLabo');

Route::get('/import', [LaboController::class, 'create'])->name('import');

require __DIR__.'/auth.php';

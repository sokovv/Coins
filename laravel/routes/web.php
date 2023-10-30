<?php

use App\Http\Controllers\CoinsController;
use Illuminate\Support\Facades\Http;
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


Route::get('/', [CoinsController::class, 'index'])->name('index');
Route::get('/getCoins', [CoinsController::class, 'getCoins'])->name('getCoins');


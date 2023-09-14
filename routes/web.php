<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;

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

Route::get('/', [SiteController::class, 'index']);
Route::get('/vigenere', [SiteController::class, 'vigenere']);
Route::get('/vernam', [SiteController::class, 'vernam']);

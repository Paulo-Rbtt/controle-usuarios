<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/perfil/{id}', [ProfileController::class, 'show'])->name('perfil.show');
Route::post('/perfil/{id}', [ProfileController::class, 'update'])->name('perfil.update');
<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('registre', function () {
    return view('registre');
})->name('registre')->middleware('guest');

Route::post('login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('login-google', [UserController::class, 'loginGoogle'])->name('login-google')->middleware('guest');;

Route::get('/google-callback', [UserController::class, 'googleCallback'])->name('google-callback')->middleware('guest');;

Route::post('registre', [UserController::class, 'registre'])->name('registre')->middleware('guest');

Route::post('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');


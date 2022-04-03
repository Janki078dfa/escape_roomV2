<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\LogInController;
use App\Http\Controllers\User\Auth\LogOutController;

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


Route::view('/', 'home');
Route::view('/login', 'user/auth/login');
Route::view('/register', 'user/auth/register');


Route::get('/', [GameController::class, 'index']);


Route::post('RegisterController', [RegisterController::class, 'register']);
Route::post('LogInController', [LogInController::class, 'logIn']);
Route::post('LogOutController', [LogOutController::class, 'logOut']);
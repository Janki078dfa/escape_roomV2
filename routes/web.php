<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Game\ManageGameController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\LogInController;
use App\Http\Controllers\User\Auth\LogOutController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\ManageUserController;
use App\Http\Controllers\Room\ManageRoomController;
use Illuminate\Support\Facades\Session;

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
Route::view('/rooms', 'room/room');

Route::get('/create_user', function () {
    return view('user/create_user')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
});

Route::get('/create_room', function () {
    return view('room.create_room')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
});

Route::get('/create_game', function () {
    return view('game.create_game')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
});

Route::view('/manage_user', 'user/manage_user');


Route::get('/', [ManageGameController::class, 'index']);
Route::get('/rooms', [ManageRoomController::class, 'index']);
Route::get('/games', [ManageGameController::class, 'view']);
Route::get('/manage_user', [ManageUserController::class, 'index']);


Route::post('RegisterController', [RegisterController::class, 'register']);
Route::post('LogInController', [LogInController::class, 'logIn']);
Route::post('LogOutController', [LogOutController::class, 'logOut']);
Route::post('CreateUserController', [CreateUserController::class, 'create_user']);
Route::post('ManageUserController', [ManageUserController::class, 'manage_user']);
Route::post('EditUserController', [ManageUserController::class,  'edit_user']);
Route::post('ManageRoomController', [ManageRoomController::class, 'manage_room']);
Route::post('EditRoomController', [ManageRoomController::class, 'edit_room']);
Route::post('CreateRoomController', [ManageRoomController::class, 'create_room']);
Route::post('ManageGameController', [ManageGameController::class, 'manage_game']);
Route::post('EditGameController', [ManageGameController::class, 'edit_game']);
Route::post('CreateGameController', [ManageGameController::class, 'create_game']);

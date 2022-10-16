<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

//Login module
Route::group(['prefix' => '/login'], function () {
    Route::get('/',       [AuthController::class, 'index'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('login.logout');
    Route::post('/auth',  [AuthController::class, 'auth'])->name('login.auth');
});


//Admin module
Route::group(['prefix' => '/admin', 'middleware' => ['userPermission:1']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('admin');

    //Users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/user/{id}/password',  [UserController::class, 'password'])->name('user.password');
    Route::patch('/user/{id}/password',  [UserController::class, 'updatePassword'])->name('user.update-password');
});

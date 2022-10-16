<?php

use Illuminate\Support\Facades\Auth;
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

    Route::get('/', function () {
        dd('Admin module');
    })->name('admin');
});

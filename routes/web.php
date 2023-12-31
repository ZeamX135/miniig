<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Auth::routes();
Route::get('@{username}', [UserController::class, 'show']);


Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('user/edit', [UserController::class, 'edit']);
    Route::put('user/edit', [UserController::class, 'update']);
    Route::resource('post', PostController::class);

    Route::get('/follow/{user_id}', [UserController::class, 'follow']);
    Route::get('/like/{post_id}', [LikeController::class, 'toggle']);
});

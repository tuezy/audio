<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('index');
    Route::get('/login', [\App\Http\Controllers\Dashboard\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Dashboard\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Dashboard\AuthController::class, 'logout'])->name('logout');

    Route::get('/settings', [\App\Http\Controllers\Dashboard\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [\App\Http\Controllers\Dashboard\SettingsController::class, 'update']);

    Route::get('/users', [\App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/datatables', [\App\Http\Controllers\Dashboard\UsersController::class, 'datatables'])->name('users.index.datatables');
    Route::post('/users', [\App\Http\Controllers\Dashboard\UsersController::class, 'update']);
    Route::get('/users/delete/{id}', [\App\Http\Controllers\Dashboard\UsersController::class, 'delete']);


    Route::get('/playlist', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'index'])->name('playlist.index');
    Route::get('/playlist/datatables', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'datatables'])->name('playlist.index.datatables');

    Route::post('/playlist/edit', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'update']);
    Route::get('/playlist/edit', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'edit'])->name('playlist.edit');

    Route::post('/playlist/create', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'store']);
    Route::get('/playlist/create', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'create'])->name('playlist.create');


    Route::get('/audio', [\App\Http\Controllers\Dashboard\AudioController::class, 'index'])->name('audio.index');
    Route::get('/audio/create', [\App\Http\Controllers\Dashboard\AudioController::class, 'create'])->name('audio.create');
    Route::post('/audio/create', [\App\Http\Controllers\Dashboard\AudioController::class, 'store'])->name('audio.store');
    Route::get('/audio/delete/{id}', [\App\Http\Controllers\Dashboard\AudioController::class, 'delete'])->name('audio.delete');


    Route::get('/playlist/make/{id}', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'make'])->name('make.playlist');



    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('any');
});

    Route::get('/hsl/{user}/{id}.m3u8', [\App\Http\Controllers\Dashboard\PlaylistController::class, 'make'])->name('make.playlist');

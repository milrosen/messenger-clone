<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/messages/{id}', [MessageController::class, 'index'])
    ->name('messages');
Route::post('/message', [HomeController::class, 'message'])
    ->name('message');


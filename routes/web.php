<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserController;

Route::get('/', function () {
    //pass: 123456: $2y$10$dq5nQDcYVbJevCWkgHrqautMp.DQR9CsuRa247K66vavvvaBLj4HG
    return view('layout');
});

Route::get('/login', [UserController::class, 'index'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [] )->name('dashboard');
});

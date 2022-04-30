<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
    //pass: 123456: $2y$10$dq5nQDcYVbJevCWkgHrqautMp.DQR9CsuRa247K66vavvvaBLj4HG
    // return csrf_token();
    // return view('welcome');
// });

Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function(){
        return 'thành công';
    } )->name('dashboard');
});

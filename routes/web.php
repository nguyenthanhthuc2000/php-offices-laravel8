<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

 Route::get('/', function () {
//    pass: 123456: $2y$10$dq5nQDcYVbJevCWkgHrqautMp.DQR9CsuRa247K66vavvvaBLj4HG
//     return csrf_token();
     return view('layout');
 });

Route::get('/dang-nhap',[AuthController::class, 'index'])->name('login');
Route::post('/login-submit',[AuthController::class, 'login'])->name('login.post');

Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    // user
    Route::get('/dang-ky', [UserController::class, 'create'])->name('register')->middleware('isAdmin');
    Route::get('/trang-chu', function () {
        return view('layout');
    })->name('dashboard');

//    Route::get('/danh-sach-giao-vien', [StudentController::class, 'listStudent'])->name('dashboard');

    Route::get('/danh-sach-sinh-vien', [StudentController::class, 'listStudent'])->name('listStudent');
});

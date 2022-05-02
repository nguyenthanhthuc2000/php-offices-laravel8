<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home');

Route::get('/dang-nhap',[AuthController::class, 'index'])->name('login');
Route::post('/login-submit',[AuthController::class, 'login'])->name('login.post');
Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // user
    Route::get('/tao-moi', [UserController::class, 'create'])->name('register')->middleware('isAdmin');
    Route::post('/register', [UserController::class, 'store'])->name('register.post')->middleware('isAdmin');

    Route::get('/danh-sach-giao-vien', [TeacherController::class, 'listTeacher'])->name('listTeacher')->middleware('isAdmin');
    Route::get('/danh-sach-sinh-vien', [StudentController::class, 'listStudent'])->name('listStudent');
    Route::get('/danh-sach-lop', [ClassListController::class, 'listClass'])->name('listClass')->middleware('isAdmin');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->middleware('isStudent');
});

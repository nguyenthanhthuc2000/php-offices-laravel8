<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NewsController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home');
Route::get('/dang-nhap',[AuthController::class, 'index'])->name('login');
Route::post('/login-submit',[AuthController::class, 'login'])->name('login.post');
Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
Route::get('/get-district/{id_province}', [Controller::class, 'getDistrictByProvince'])->name('getDistrict');
Route::get('/get-ward/{id_district}/{id_province}', [Controller::class, 'getWardByDistrict'])->name('getWard/{id_province}');

Route::middleware(['auth'])->group(function () {
    // user
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/tao-moi-giao-vien', [TeacherController::class, 'create'])->name('register.teacher');
        Route::get('/danh-sach-giao-vien', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/chinh-sua-thong-tin-giao-vien/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::get('/danh-sach-khoa', [FacultyController::class, 'index'])->name('faculty.index');
        Route::get('/danh-sach-lop', [ClassListController::class, 'index'])->name('class.index');
        Route::get('/nien-khoa', [SchoolYearController::class, 'index'])->name('school.year.index');

        Route::post('/edit-user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/xoa-sinh-vien/{id}', [UserController::class, 'delete'])->name('student.delete');
        Route::get('/xoa-giao-vien/{id}', [UserController::class, 'delete'])->name('teacher.delete');

        Route::get('/danh-sach-bai-viet', [NewsController::class, 'index'])->name('news.index');

        Route::get('/tao-moi-sinh-vien', [StudentController::class, 'create'])->name('register.student');
        Route::post('/register', [UserController::class, 'store'])->name('register.post');
        Route::get('/them-moi-tin-tuc', [NewsController::class, 'create'])->name('news.create');
        Route::post('/tin-tuc/store', [NewsController::class, 'store'])->name('news.store');
        Route::post('/tin-tuc/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::get('/cap-nhat-tin-tuc/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::post('/xoa-bai-viet/{id}', [NewsController::class, 'delete'])->name('news.delete');
    });

    Route::get('/danh-sach-sinh-vien', [StudentController::class, 'index'])->name('student.index');
    Route::get('/thong-tin-sinh-vien/{id}', [StudentController::class, 'detail'])->name('student.detail');
    Route::get('/chinh-sua-thong-tin-sinh-vien/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::get('/xuat-bieu-mau', [FileController::class, 'export'])->name('file.dowload');
    Route::get('/tin-tuc/{slug}', [NewsController::class, 'detail'])->name('news.detail');
});

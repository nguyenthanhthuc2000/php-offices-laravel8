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
    Route::get('/doi-mat-khau', [AuthController::class, 'changePassword'])->name('password.change');
    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('password.update');
    // user
    Route::middleware(['isAdmin'])->group(function () {
        //Khoa
        Route::get('/tao-moi-khoa', [FacultyController::class, 'create'])->name('faculty.create');
        Route::get('/chinh-sua-khoa/{id}', [FacultyController::class, 'edit'])->name('faculty.edit');
        Route::post('/store-faculty', [FacultyController::class, 'store'])->name('faculty.store');
        Route::post('/update-faculty/{id}', [FacultyController::class, 'update'])->name('faculty.update');

         //Lớp
         Route::get('/tao-moi-lop', [ClassListController::class, 'create'])->name('class.create');
         Route::get('/chinh-sua-lop/{id}', [ClassListController::class, 'edit'])->name('class.edit');
         Route::post('/store-class', [ClassListController::class, 'store'])->name('class.store');
         Route::post('/update-class/{id}', [ClassListController::class, 'update'])->name('class.update');

        //Niên khóa
        Route::get('/tao-moi-nien-khoa', [SchoolYearController::class, 'create'])->name('school.year.create');
        Route::get('/chinh-sua-nien-khoa/{id}', [SchoolYearController::class, 'edit'])->name('school.year.edit');
        Route::post('/store-nien-khoa', [SchoolYearController::class, 'store'])->name('school.year.store');
        Route::post('/update-nien-khoa/{id}', [SchoolYearController::class, 'update'])->name('school.year.update');

        // Giáo viên
        Route::get('/tao-moi-giao-vien', [TeacherController::class, 'create'])->name('register.teacher');
        Route::get('/danh-sach-giao-vien', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/chinh-sua-thong-tin-giao-vien/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::get('/xoa-giao-vien/{id}', [UserController::class, 'delete'])->name('teacher.delete');

        // Sinh viên
        Route::get('/tao-moi-sinh-vien', [StudentController::class, 'create'])->name('register.student');

        Route::get('/danh-sach-khoa', [FacultyController::class, 'index'])->name('faculty.index');
        Route::get('/danh-sach-lop', [ClassListController::class, 'index'])->name('class.index');
        Route::get('/nien-khoa', [SchoolYearController::class, 'index'])->name('school.year.index');

        Route::get('/danh-sach-bai-viet', [NewsController::class, 'index'])->name('news.index');


        Route::post('/register', [UserController::class, 'store'])->name('register.post');
        Route::get('/them-moi-tin-tuc', [NewsController::class, 'create'])->name('news.create');
        Route::post('/tin-tuc/store', [NewsController::class, 'store'])->name('news.store');
        Route::post('/tin-tuc/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::get('/cap-nhat-tin-tuc/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::get('/xoa-bai-viet/{id}', [NewsController::class, 'delete'])->name('news.delete');

    });
    Route::get('/xoa-sinh-vien/{id}', [UserController::class, 'delete'])->name('student.delete')->middleware('isAdmin', 'isTeacher');
    Route::post('/edit-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/chinh-sua-thong-tin-sinh-vien/{id}', [StudentController::class, 'edit'])->name('student.edit');

    Route::get('/danh-sach-sinh-vien', [StudentController::class, 'index'])->name('student.index');
    Route::get('/thong-tin-sinh-vien/{id}', [StudentController::class, 'detail'])->name('student.detail');
    Route::get('/ho-so-sinh-vien', [StudentController::class, 'profile'])->name('profile');
    Route::get('/xuat-bieu-mau', [FileController::class, 'export'])->name('file.dowload');
    Route::get('/tin-tuc/{slug}', [NewsController::class, 'detail'])->name('news.detail');
    Route::get('/reset-password/{id}', [StudentController::class, 'resetPassword'])->name('student.reset.password');
});

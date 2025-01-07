<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

# Trang đăng nhập
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
# Đăng nhập bằng admin
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
# Đăng nhập bằng MSSV
Route::post('/login_student', [AuthController::class, 'login_student'])->name('login_student.post');
# Đăng xuất
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['Admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        # Trang danh sách
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        # Trang tạo
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        # Tạo tài khoản
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        # Lấy thông tin edit
        Route::get('/edit/{mssv}', [AdminController::class, 'edit'])->name('admin.edit');
        # Sửa tài khoản
        Route::post('/update/{mssv}', [AdminController::class, 'update'])->name('admin.update');
        # Xoá mềm tài khoản
        Route::get('/delete/{mssv}', [AdminController::class, 'delete'])->name('admin.delete');
    });

});

Route::middleware(['Student'])->group(function () {

    Route::prefix('student')->group(function () {
        # Trang student
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
        # Lấy thông tin edit
        Route::get('/edit', [StudentController::class, 'edit'])->name('student.edit');
        # Sửa tài khoản
        Route::post('/update', [StudentController::class, 'update'])->name('student.update');
    });

});


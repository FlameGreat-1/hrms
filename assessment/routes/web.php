<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Skill\SkillController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('departments', DepartmentController::class)->only(['index', 'create', 'store']);
    Route::resource('skills', SkillController::class)->only(['index', 'create', 'store']);
    Route::resource('employees', EmployeeController::class);

    Route::get('employees/filter/department', [EmployeeController::class, 'filter'])->name('employees.filter');
    Route::post('employees/check-email', [EmployeeController::class, 'checkEmail'])->name('employees.check-email');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

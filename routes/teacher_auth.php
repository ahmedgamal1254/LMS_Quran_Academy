<?php

use App\Http\Controllers\TeacherAuth\AuthenticatedSessionController;
use App\Http\Controllers\TeacherAuth\ConfirmablePasswordController;
use App\Http\Controllers\TeacherAuth\EmailVerificationNotificationController;
use App\Http\Controllers\TeacherAuth\EmailVerificationPromptController;
use App\Http\Controllers\TeacherAuth\NewPasswordController;
use App\Http\Controllers\TeacherAuth\PasswordController;
use App\Http\Controllers\TeacherAuth\PasswordResetLinkController;
use App\Http\Controllers\TeacherAuth\RegisteredUserController;
use App\Http\Controllers\TeacherAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:teacher','guest:partent','guest','guest:admin'])->group(function () {
    Route::get('teacher/register', [RegisteredUserController::class, 'create'])
                ->name('teacher.register');

    Route::post('teacher/register', [RegisteredUserController::class, 'store'])->name("teacher.store");

    Route::get('teacher/login', [AuthenticatedSessionController::class, 'create'])
                ->name('teacher.login');

    Route::post('teacher/login', [AuthenticatedSessionController::class, 'store'])->name('teacher.login');

    Route::get('teacher/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('teacher/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('teacher/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('teacher/reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware(['isTeacher'])->group(function () {
    Route::get('/teacher', function () {
        return view("teacher_dashboard.dashboard");
    }); 
    Route::post('teacher/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout_teacher');
});
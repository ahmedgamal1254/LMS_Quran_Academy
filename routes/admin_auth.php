<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:teacher','guest:partent','guest','guest:admin'])->group(function () {
    // Route::get('admin/register', [RegisteredUserController::class, 'create'])
    //             ->name('admin.register');

    // Route::post('admin/register', [RegisteredUserController::class, 'store'])->name("admin.store");
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');
});

Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout_admin');
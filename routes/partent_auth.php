<?php

use App\Http\Controllers\PartentAuth\AuthenticatedSessionController;
use App\Http\Controllers\PartentAuth\ConfirmablePasswordController;
use App\Http\Controllers\PartentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\PartentAuth\EmailVerificationPromptController;
use App\Http\Controllers\PartentAuth\NewPasswordController;
use App\Http\Controllers\PartentAuth\PasswordController;
use App\Http\Controllers\PartentAuth\PasswordResetLinkController;
use App\Http\Controllers\PartentAuth\RegisteredUserController;
use App\Http\Controllers\PartentAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:partent','guest:teacher','guest','guest:admin'])->group(function () {
    Route::get('partent/register', [RegisteredUserController::class, 'create'])
                ->name('partent.register');

    Route::post('partent/register', [RegisteredUserController::class, 'store'])->name("partent.store");
    Route::get('partent/login', [AuthenticatedSessionController::class, 'create'])
                ->name('partent.login');

    Route::post('partent/login', [AuthenticatedSessionController::class, 'store'])->name('partent.login');
});

Route::middleware(['isPartent'])->group(function () {
    Route::get('/partent/dashboard', function () {
        return view("partent_dashboard.dashboard");
    }); 

    Route::post('partent/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout_partent');
});
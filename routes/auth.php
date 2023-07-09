<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('inscription', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('inscription', [RegisteredUserController::class, 'store']);

    Route::get('connexion', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('connexion', [AuthenticatedSessionController::class, 'store']);

    Route::get('mot-de-passe-oublié', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('mot-de-passe-oublié', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('réinitisalité-mot-de-passe/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('réinitisalité-mot-de-passe', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('deconnexion', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
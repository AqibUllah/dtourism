<?php

use App\Http\Controllers\HotelManager\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HotelManager\Auth\ConfirmablePasswordController;
use App\Http\Controllers\HotelManager\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\HotelManager\Auth\EmailVerificationPromptController;
use App\Http\Controllers\HotelManager\Auth\NewPasswordController;
use App\Http\Controllers\HotelManager\Auth\PasswordController;
use App\Http\Controllers\HotelManager\Auth\PasswordResetLinkController;
use App\Http\Controllers\HotelManager\Auth\RegisteredUserController;
use App\Http\Controllers\HotelManager\Auth\VerifyEmailController;
use App\Http\Controllers\HotelManager\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('hotelmanager')->name('hotel_manager.')->group(function () {

    Route::middleware('guest:hotelmanager')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

    Route::middleware('auth:hotelmanager')->group(function () {
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

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});

Route::prefix('hotelmanager')->middleware(['auth:hotelmanager'])->name('hotel_manager.')->group(function () {

        Route::controller(\App\Http\Controllers\HotelManager\Dashboard::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile',  'destroy')->name('profile.destroy');
        });

        Route::resource('hotels',\App\Http\Controllers\HotelManager\HotelController::class);

});

<?php

use App\Http\Controllers\TourGuide\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TourGuide\Auth\ConfirmablePasswordController;
use App\Http\Controllers\TourGuide\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\TourGuide\Auth\EmailVerificationPromptController;
use App\Http\Controllers\TourGuide\Auth\NewPasswordController;
use App\Http\Controllers\TourGuide\Auth\PasswordController;
use App\Http\Controllers\TourGuide\Auth\PasswordResetLinkController;
use App\Http\Controllers\TourGuide\Auth\RegisteredUserController;
use App\Http\Controllers\TourGuide\Auth\VerifyEmailController;
use App\Http\Controllers\TourGuide\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('tour_guide')->name('tour_guide.')->group(function () {

    Route::middleware('guest:tour_guide')->group(function () {
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

    Route::middleware('auth:tour_guide')->group(function () {
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

Route::prefix('tour_guide')->middleware(['auth:tour_guide'])->name('tour_guide.')->group(function () {

        Route::controller(\App\Http\Controllers\TourGuide\Dashboard::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile',  'destroy')->name('profile.destroy');
        });

        Route::controller(\App\Http\Controllers\Transporter\VehicleController::class)->group(function () {
            Route::get('/vehicles/index', 'index')->name('vehicles.index');
            Route::get('/vehicles/create', 'create')->name('vehicles.create');
            Route::post('/vehicles/store', 'store')->name('vehicles.store');
            Route::get('/vehicles/edit/{vehicle}', 'edit')->name('vehicles.edit');
            Route::get('/vehicles/show/{vehicle}', 'show')->name('vehicles.show');
            Route::patch('/vehicles/update/{vehicle}', 'update')->name('vehicles.update');
            Route::delete('/vehicles/destroy/{vehicle}',  'destroy')->name('vehicles.destroy');
        });

});

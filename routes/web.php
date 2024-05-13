<?php

use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelManagerController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\TransporterDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Route::controller(\App\Http\Controllers\Admin\Dashboard::class)->group(function () {
//    Route::prefix('admin')->name('admin.')->group(function () {
//        Route::get('/dashboard', 'index')->name('dashboard');
//    });
//})->middleware(['auth:admin','verified']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// use App\Http\Controllers\CustomerController;
// Route::get('/register', [CustomerController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [CustomerController::class, 'register']);
// Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [CustomerController::class, 'login']);
// Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
//Route::get('/customer/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
//Route::post('/customer/login', [CustomerController::class, 'login']);
//Route::get('/customer/register', [CustomerController::class, 'showRegistrationForm'])->name('customer.register');
//Route::post('/customer/register', [CustomerController::class, 'register']);


Route::get('/hotelmanager/login', [HotelManagerController::class, 'showLoginForm'])->name('hotelmanager.login');
Route::post('/hotelmanager/login', [HotelManagerController::class, 'login']);
Route::get('/hotelmanager/register', [HotelManagerController::class, 'showRegistrationForm'])->name('hotelmanager.register');
Route::post('/hotelmanager/register', [HotelManagerController::class, 'register']);
Route::post('/logout', [HotelManagerController::class, 'logout'])->name('logout-manager');
Route::post('/create-hotel', [HotelManagerController::class, 'createHotel'])->name('create-hotel');

Route::prefix('transporter')->group(function () {
    Route::get('/login', [TransporterController::class, 'showLoginForm'])->name('transporter.login');
    Route::post('/login', [TransporterController::class, 'login']);
    Route::get('/register', [TransporterController::class, 'showRegistrationForm'])->name('transporter.register');
    Route::post('/register', [TransporterController::class, 'register']);
    Route::middleware('auth:transporter')->group(function () {
        Route::get('/dashboard', [TransporterDashboardController::class, 'index'])->name('dashboard.index');
        // Define routes for vehicle management (add, edit, delete)
    });
});

Route::middleware(['auth:transporter'])->group(function () {

    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');


    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');


    Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');


    Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');


    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
});


Route::get('tourists/register', function(){dd("reach here");} ,[TourGuideController::class, 'showRegistrationForm'])->name('tourists.register');
// Route::get('tourists/register', function() {
//     dd("reach here");
// }, [TourGuideController::class, 'showRegistrationForm'])->name('tourists.register');
Route::post('tourists/register', [TourGuideController::class, 'register']);
Route::get('tourists/login',[TourGuideController::class, 'showLoginForm'])->name('tourists.login');
Route::post('tourists/login', [TourGuideController::class, 'login']);

//Route::post('/logout', [TourGuideController::class, 'logout'])->name('tourist.logout');


// Route::post('/bookings/create', [BookingController::class, 'create'])->name('submitBooking');

Route::middleware(['auth.customer'])->group(function () {
    Route::post('/bookings/{hotel}', [BookingController::class, 'bookHotel'])->name('bookings.bookHotel');
    Route::post('/bookings/{transport}', [BookingController::class, 'bookTransport'])->name('bookings.bookTransport');
    Route::post('/bookings/{tourGuide}', [BookingController::class, 'bookTourGuide'])->name('bookings.bookTourGuide');
    Route::post('/bookings', [BookingController::class, 'submitBooking'])->name('bookings.submitBooking');
});
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', 'TransporterDashboardController@index')->name('dashboard');
//     Route::get('/dashboard/vehicles', 'TransporterDashboardController@vehicles')->name('vehicles');
//     Route::get('/dashboard/vehicles/create', 'TransporterDashboardController@createVehicle')->name('vehicles.create');
//     Route::post('/dashboard/vehicles/store', 'TransporterDashboardController@storeVehicle')->name('vehicles.store');
//     Route::get('/dashboard/vehicles/{id}/edit', 'TransporterDashboardController@editVehicle')->name('vehicles.edit');
//     Route::put('/dashboard/vehicles/{id}', 'TransporterDashboardController@updateVehicle')->name('vehicles.update');
//     Route::delete('/dashboard/vehicles/{id}', 'TransporterDashboardController@destroyVehicle')->name('vehicles.destroy');
// });

require __DIR__.'/admin.php';

require __DIR__.'/customer.php';

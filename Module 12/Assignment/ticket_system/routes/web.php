<?php

use App\Http\Controllers\backend\BusController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\DriverController;
use App\Http\Controllers\backend\ReservationController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.pages.dashboard');
// });

Route::get('/', [FrontendController::class, 'index'])->name('dashboard.index');
Route::post('/trickets-book/store', [FrontendController::class, 'store'])->name('trickets.store');

Route::get('/dashboard', function () {
    return view('backend/pages/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //customer
    Route::resource('customers', CustomerController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('buses', BusController::class);
    Route::resource('reservations', ReservationController::class);
});

require __DIR__.'/auth.php';



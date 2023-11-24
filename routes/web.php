<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [ViewController::class, 'index'])->name('/');
Route::resource('booking', BookingController::class);


// Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('user', UserController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::put('/appointment/{id}/toggle-approve', [BookingController::class, 'toggleStatus'])->name('toggleStatus');


    Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');
    Route::delete('/trash/delete/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
    Route::get('/trash/restore/{id}', [TrashController::class, 'restore'])->name('trash.restore');
});

require __DIR__ . '/auth.php';

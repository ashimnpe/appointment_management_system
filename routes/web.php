<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', [ViewController::class, 'index'])->name('/');

Route::resource('booking', BookingController::class);

Route::get('/forgot', [PasswordController::class, 'showForgot'])->name('password.forgot');
Route::post('/forgot', [PasswordController::class, 'forgotPassword'])->name('generate.email');

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
    Route::resource('pages', PageController::class);

    Route::put('/notifications', [NotificationController::class, 'showNotifications'])->name('notifications');

    Route::get('/patient/search', [AppointmentController::class, 'searchPatient'])->name('patient.search');

    Route::put('/reset-password', [PasswordController::class, 'resetPassword'])->name('passwordreset');

    Route::get('/change-password', [PasswordController::class, 'show'])->name('change_password.form');
    Route::put('/change-password', [PasswordController::class, 'changePassword'])->name('change.password');

    Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');
    Route::delete('/trash/delete/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
    Route::get('/trash/restore/{id}', [TrashController::class, 'restore'])->name('trash.restore');
});



require __DIR__ . '/auth.php';

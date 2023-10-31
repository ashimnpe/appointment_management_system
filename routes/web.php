<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Department;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/profile/{id}', [UserController::class, 'show'])->name('user.profile');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    // Doctors
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/profile/{id}', [DoctorController::class, 'show'])->name('doctors.profile');
    Route::get('/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/delete/{id}', [DoctorController::class, 'destroy'])->name('doctors.delete');

    // Department
    Route::resource('department', DepartmentController::class);

    // Route::resource('education', EducationController::class);
    Route::get('/doctor/store', [DoctorController::class, 'doctorStore'])->name('doctor.store');

    Route::get('/education/create', [DoctorController::class, 'educationCreate'])->name('doctorEducation.create');
    Route::post('/education/store', [DoctorController::class, 'educationStore'])->name('doctorEducation.store');

    Route::get('/experience/create', [DoctorController::class, 'experienceCreate'])->name('doctorExperience.create');
    Route::post('/experience/store', [DoctorController::class, 'experienceStore'])->name('doctorExperience.store');



    // Route::resource('experience', ExperienceController::class);





});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\TrainingClassController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Modules
    Route::resource('courses', CourseController::class);

    Route::resource('trainers', TrainerController::class);

    Route::resource('participants', ParticipantController::class);

    Route::resource('classes', TrainingClassController::class);

    Route::resource('enrollments', EnrollmentController::class);

    Route::resource('attendances', AttendanceController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
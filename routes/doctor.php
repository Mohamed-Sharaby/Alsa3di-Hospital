<?php

use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\ReservationController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'login'])->name('doctor.login');
Route::post('login', [AuthController::class, 'postLogin'])->name('doctor.postLogin');


Route::group(['middleware' => ['auth:web','doctor'], 'as' => 'doctor.'], function () {

    Route::get('main', [DoctorController::class, 'index'])->name('main');
    Route::get('edit-user-account', [DoctorController::class, 'edit_user_account'])->name('edit_user_account');
    Route::put('edit-user-account', [DoctorController::class, 'update_user_account'])->name('update_user_account');

    Route::get('edit-doctor-account', [DoctorController::class, 'edit_doctor_account'])->name('edit_doctor_account');
    Route::put('edit-doctor-account', [DoctorController::class, 'update_doctor_account'])->name('update_doctor_account');

    Route::resource('appointments', 'AppointmentController');
    Route::resource('reservations', 'ReservationController');
    Route::put('change-reservation-status/{id}', [ReservationController::class, 'changeStatus'])->name('changeStatus');
    Route::any('logout', [AuthController::class, 'logout'])->name('logout');
});

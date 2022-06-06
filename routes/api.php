<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'middleware' => 'guest:api'], function () {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('forget-password', [\App\Http\Controllers\Api\AuthController::class, 'forgetPassword']);
    Route::post('change-password', [\App\Http\Controllers\Api\AuthController::class, 'changePassword']);
    Route::post('verify-user', [\App\Http\Controllers\Api\AuthController::class, 'verifyUser']);
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('update-profile', [\App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
        Route::post('update-password', [\App\Http\Controllers\Api\AuthController::class, 'updatePassword']);
        Route::post('change-lang', [\App\Http\Controllers\Api\AuthController::class, 'changeLang']);
        Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    });

    Route::get('branches', [\App\Http\Controllers\Api\BookingController::class, 'branches']);
    Route::get('services', [\App\Http\Controllers\Api\BookingController::class, 'services']);
    Route::get('specializations', [\App\Http\Controllers\Api\BookingController::class, 'specializations']);
    Route::get('doctors', [\App\Http\Controllers\Api\BookingController::class, 'doctors']);
    Route::get('doctor-appointments/{id}', [\App\Http\Controllers\Api\BookingController::class, 'doctorAppointments']);
    Route::apiResource('appointments', '\App\Http\Controllers\Api\BookingController');
    Route::get('medical-file', [\App\Http\Controllers\Api\AuthController::class, 'medicalFile']);
    Route::get('notifications', [\App\Http\Controllers\Api\NotificationController::class, 'index']);
    Route::get('notifications-count', [\App\Http\Controllers\Api\NotificationController::class, 'count']);
    Route::delete('notifications/{id}', [\App\Http\Controllers\Api\NotificationController::class, 'destroy']);

});

Route::get('home', [\App\Http\Controllers\Api\HomeController::class, 'index']);
Route::get('sliders', [\App\Http\Controllers\Api\HomeController::class, 'sliders']);
Route::get('setting/{name}', [\App\Http\Controllers\Api\HomeController::class, 'settings']);
Route::get('about-us', [\App\Http\Controllers\Api\HomeController::class, 'aboutUs']);
Route::get('contact-us', [\App\Http\Controllers\Api\HomeController::class, 'contactUs']);
Route::post('contact-us', [\App\Http\Controllers\Api\HomeController::class, 'contact']);
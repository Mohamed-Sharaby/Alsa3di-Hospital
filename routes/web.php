<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact-us', 'ContactController@index');
Route::post('/contact-us', 'ContactController@store');
Route::get('/branch/{branch}', 'HomeController@branch');
Route::get('/doctors', 'DoctorController@index');
Route::get('/doctor/{doctor}', 'DoctorController@show');
Route::get('/app/{doctor}', 'DoctorController@makeAppointments');
Route::get('/specialty', 'SpecialtyController@index');
Route::get('/specialty/{id}', 'SpecialtyController@show');
Route::get('/news', 'NewsController@index');
Route::get('/news/{news}', 'NewsController@show')->name('news.show');
Route::get('/pages/{page}', 'HomeController@page');
Route::post('/subscribe-newsletter', 'HomeController@subscribeToNewsletter');

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/verify', 'AuthController@verify');
Route::post('/forget-password', 'AuthController@forgetPassword');
Route::post('/change-password', 'AuthController@changePassword');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/appointment', ['as' => 'appointment', 'uses' => 'BookingController@appointment']);
        Route::get('/consult', ['as' => 'consult', 'uses' => 'BookingController@consult']);
        Route::get('/service', ['as' => 'service', 'uses' => 'BookingController@requestService']);
        Route::get('/conversation', ['as' => 'conversation', 'uses' => 'BookingController@conversation']);
        Route::get('/doctors', ['as' => 'doctors', 'uses' => 'BookingController@doctors']);
        Route::get('/timeslots', ['as' => 'timeslots', 'uses' => 'BookingController@timeslots']);
        Route::get('/services', ['as' => 'services', 'uses' => 'BookingController@services']);
        Route::post('/appointment', ['as' => 'appointment.store', 'uses' => 'BookingController@storeAppointment']);
        Route::post('/request-doctor', ['as' => 'request_doctor', 'uses' => 'BookingController@requestDoctor']);
        Route::post('/service', ['as' => 'service.store', 'uses' => 'BookingController@storeService']);
        Route::post('/{id}/cancel', ['as' => 'cancel', 'uses' => 'BookingController@cancel']);
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
        Route::get('/reservations', ['as' => 'reservations', 'uses' => 'UserController@reservations']);
        Route::get('/orders', ['as' => 'orders', 'uses' => 'UserController@orders']);
        Route::get('/carts', ['as' => 'carts', 'uses' => 'UserController@carts']);
        Route::get('/cart/{cart}', ['as' => 'cart', 'uses' => 'UserController@cart']);
        Route::get('/medical-file', ['as' => 'medical_file', 'uses' => 'UserController@medicalFile']);
        Route::get('/change-password', ['as' => 'password', 'uses' => 'UserController@changePassword']);
        Route::post('/profile', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
        Route::post('/update-password', ['as' => 'updatePassword', 'uses' => 'UserController@updatePassword']);
    });


    Route::post('/finish-cart', 'CartController@finishCart');
    Route::get('/finish-cart/{cart}/delivery', ['as' => 'cart.delivery', 'uses' => 'CartController@deliveryInfo']);
    Route::get('/finish-cart/{cart}/payment', ['as' => 'cart.payment', 'uses' => 'CartController@payment']);
    Route::post('/finish-cart/{cart}/update-delivery', ['as' => 'cart.updateDelivery', 'uses' => 'CartController@updateDelivery']);
    Route::post('/finish-cart/{cart}/final', ['as' => 'cart.submit', 'uses' => 'CartController@submitCart']);
    Route::post('/cancel-cart/{cart}', ['as' => 'cart.cancel', 'uses' => 'CartController@cancelCart']);

});

Route::post('/add-to-cart/{product}', 'CartController@addToCart');
Route::delete('/remove-from-cart/{id}', 'CartController@removeFromCart');
Route::get('/cart', 'CartController@cart');
Route::post('/check-coupon', 'CartController@checkCoupon');
Route::get('/cities/{id}', 'CartController@cities');

Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'StoreController@index']);
    Route::get('/products', ['as' => 'products', 'uses' => 'StoreController@products']);
    Route::get('/product/{product}', ['as' => 'product', 'uses' => 'StoreController@product']);
});

Route::get('se', function () {
    dd(session('cart'));
});
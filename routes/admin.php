<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Route;
Route::get('/', [AuthController::class, 'showGeneralLoginPage'])->name('general');
Route::get('login', [AuthController::class, 'login'])->name('admin.login');
Route::post('login', [AuthController::class, 'postLogin'])->name('admin.postLogin');


Route::group(['middleware' => ['auth:admin', 'admin'], 'as' => 'admin.'], function () {

    Route::get('main', [DashboardController::class, 'index'])->name('main');
    Route::resources([
        'roles' => RoleController::class,
        'admins' => AdminController::class,
        'users' => UserController::class,
        'specializations' => SpecializationController::class,
        'branches' => BranchController::class,
        'services' => ServiceController::class,
        'doctors' => DoctorController::class,
        'appointments' => AppointmentController::class,
        'reservations' => ReservationController::class,
        'sliders' => SliderController::class,
        'contacts' => ContactController::class,
        'news' => NewsController::class,
        'subscribes' => SubscribeController::class,
        'settings' => SettingController::class,
        'categories' => CategoryController::class,
        'sub-categories' => SubCategoryController::class,
        'products' => ProductController::class,
        'carts' => CartController::class,
        'coupons' => CouponController::class,
        'offers' => OfferController::class,
        'abouts' => AboutController::class,
        'areas' => AreaController::class,
        'cities' => CityController::class,
        'notifications' => NotificationController::class,
    ]);

    Route::delete('attaches/image/{image}',[DashboardController::class,'delete_image']);
    Route::any('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('active/{id}/role', [RoleController::class, 'active'])->name('active.role');
    Route::post('active/{id}/{type}', [DashboardController::class, 'active'])->name('active');
    Route::put('change-reservation-status/{id}', [ReservationController::class, 'changeStatus'])->name('changeStatus');
    Route::post('add-patient', [DashboardController::class, 'addPatient'])->name('addPatient');

    Route::get('/getDoctorsByBranch/{id}', [DashboardController::class, 'getDoctorsByBranch']);
    Route::get('/getDoctorsBySpecialist/{id}', [DashboardController::class, 'getDoctorsBySpecialist']);
//    Route::get('/getTimeslotByDoctor/{id}', [DashboardController::class, 'getTimeslotByDoctor']);
    Route::get('/getTimeslotByDate/{doctor}/{date}', [DashboardController::class, 'getTimeslotByDate']);
});


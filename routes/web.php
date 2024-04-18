<?php

use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin route
Route::group(['prefix' => 'admin'], function () {

    // Start Admin Login Controller
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('login', 'showLoginForm')->name('admin.show.login');
        Route::post('login/submit', 'login')->name('admin.login');
        Route::post('logout/submit', 'logout')->name('admin.logout');
    });
    // End Admin Login Controller

    // Start Admin Forgot Password Controller
    Route::controller(AdminForgotPasswordController::class)->group(function () {
        Route::get('password/reset', 'showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/reset/submit', 'reset')->name('admin.password.update');
    });
    // End Admin Forgot Password Controller

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('admin.dashboard');
        });
        // Start Profile Controller
        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile', 'profile')->name('profile');
            Route::post('profile/update/{id}', 'profileUpdate')->name('profile.update');
            Route::post('change/profile/password', 'changeProfilePassword')->name('change.profile.password');
        });
        // End Profile Controller

        // Start Role Controller
        Route::resource('roles', RoleController::class);
        // End Role Controller

        // Start User Controller
        Route::resource('users', UserController::class);
        // End User Controller

        // Start Settings Controller
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/settings', 'index')->name('settings');
            Route::post('/settings/update/{id}', 'settingsUpdate')->name('settings.update');
        });
        // End Settings Controller
    });
});

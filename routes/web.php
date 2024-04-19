<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController as UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/form', 'contactForm')->name('contact-form');
});

Auth::routes(['verfiy' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [UserProfileController::class, 'index'])->name('home');
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserProfileController::class, 'profileUpdate'])->name('user.profile.update');
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

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

        // Start Category Controller
        Route::resource('categories', CategoryController::class);
        // End Category Controller

        // Start Faq Controller
        Route::resource('faqs', FaqController::class);
        // End Faq Controller

        // Start About Controller
        Route::resource('about', AboutController::class);
        // End About Controller

        // Start Contact Message Controller
        Route::resource('contact_messages', ContactMessageController::class);
        // End Contact Message Controller

        //post controller
        Route::controller(PostController::class)->prefix('post')->name('post.')->group(function () {
            Route::get('/',         'index')->name('index');
            Route::get('create',    'create')->name('create');
            Route::post('store',    'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update',    'update')->name('update');
            Route::delete('delete/{id}', 'delete')->name('delete');
            Route::get('/subcategory', 'subcategory')->name('subcategory');
        });
        //end post controller

        // Start Settings Controller
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/settings', 'index')->name('settings');
            Route::post('/settings/update/{id}', 'settingsUpdate')->name('settings.update');
        });
        // End Settings Controller
    });
});

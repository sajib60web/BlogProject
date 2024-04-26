<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SocialLoginSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController as UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


//social authentication
Route::get('/login/{social}',                 [SocialLoginController::class, 'socialRedirect'])->name('social.login');
Route::get('/google/login',                   [SocialLoginController::class, 'authGoogleLogin']); //google login , need url add in  your google app
Route::get('/facebook/login',                 [SocialLoginController::class, 'authFacebookLogin']); // facebook login, need url add in your facebook app
Route::any('/github/login',                   [SocialLoginController::class, 'authGithubLogin']); // facebook login, need url add in your facebook app
Route::get('/linkedin/login',                 [SocialLoginController::class, 'authLinkedinLogin']); // facebook login, need url add in your facebook app

// Welcome Route
Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
    Route::get('/post/{id}/{slug}', 'postDetails')->name('post.details');
    Route::get('/category/{id}/{slug}', 'categoryPosts')->name('category.posts');
    Route::get('/author/posts/{id}', 'postAuthor')->name('post.author');
    Route::get('/search/posts/', 'searchPosts')->name('search.posts');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/form', 'contactForm')->name('contact-form');
    Route::post('/comment', 'comment')->name('comment.submit');
    Route::post('/comment-replay', 'comment')->name('comment.replay.submit');
    Route::post('/subscribe', 'subscribe')->name('user.subscribe');
    Route::get('/terms/conditions', 'termsConditions')->name('terms_conditions');
    Route::get('/privacy/policy', 'privacyPolicy')->name('privacy_policy');
});

Auth::routes(['verfiy' => true]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [UserProfileController::class, 'index'])->name('home');
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserProfileController::class, 'profileUpdate'])->name('user.profile.update');
    Route::controller(UserPostController::class)->group(function () {
        Route::get('/post/list', 'postList')->name('post.list');
        Route::get('/post/create', 'postCreate')->name('user.post.create');
        Route::post('/post/store', 'store')->name('user.post.store');
        Route::get('/post/edit/{id}', 'edit')->name('user.post.edit');
        Route::put('/post/update/{id}', 'update')->name('user.post.update');
        Route::delete('/post/delete/{id}', 'delete')->name('user.post.delete');
    });
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
        Route::controller(UserController::class)->group(function () {

            Route::get('signup-users',                 'signupUsers')->name('signup.users.index');
            Route::put('signup-users-approve/{id}',    'signupUsersApprove')->name('signup.users.approve');
            Route::put('signup-users-reject{id}',      'signupUsersReject')->name('signup.users.reject');
            Route::get('subscribe-list',               'subscribeList')->name('subscribe.list');
            Route::get('send-newsletter',              'sendNewsletter')->name('send.newsletter');
            Route::post('send-newsletter-subscribers', 'sendNewsletterSubscriber')->name('send.newsletter.subscriber');
            Route::post('newsletter-post-search',      'NewsletterPostSearch')->name('newsletter.post.search');

            Route::get('signup-users-change/{id}',  'signupUserChange')->name('signup.users.change');
            Route::get('user/block/change/{id}',    'userBlockChange')->name('user.block.change');
        });
        // End User Controller

        // Start Category Controller
        Route::resource('categories', CategoryController::class);
        // End Category Controller

        // Start Faq Controller
        Route::resource('faqs', FaqController::class);
        // End Faq Controller

        // Start Page Controller
        Route::resource('pages', PageController::class);
        // End Page Controller

        // Start Contact Message Controller
        Route::resource('contact_messages', ContactMessageController::class);
        Route::get('contact/replay/{id}', [ContactMessageController::class, 'contactReply'])->name('contact.replay');
        Route::post('contact/replay/send', [ContactMessageController::class, 'contactSend'])->name('contact.replay.send');
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

        // Start Social Login Setting Controller
        Route::controller(SocialLoginSettingController::class)->group(function () {
            Route::get('/social_login_settings', 'index')->name('social_login_settings');
            Route::post('/social/login/setting/update', 'settingUpdate')->name('social_login_setting.update');
        });
        // End Social Login Setting Controller

        // Start Settings Controller
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/settings', 'index')->name('settings');
            Route::post('/settings/update/{id}', 'settingsUpdate')->name('settings.update');
        });
        // End Settings Controller
    });
});

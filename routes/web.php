<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SubscriptionController;


// Route::get('/', function () {
//     return view('web.index');
// })->name('home');

// Route::get('/aboutus.blade.php', function () {
//     return view('web/content/aboutus');
// });
// Route::get('/signup', function () {
//     return view('auth/signup');
// });
// Route::get('/price.blade.php', function () {
//     return view('web/content/price');
// });
// Route::get('/shopkeeper.blade.php', function () {
//     return view('web/content/shopkeeper');
// });
// Route::get('/features.blade.php', function () {
//     return view('web/content/feature');
// });
// Route::get('/adminboard', function () {
//     return view('web/content/adminboard');
// });
// Route::get('/index.blade.php', function () {
//     return view('web/index');
// });
// Route::get('/contact.blade.php', function () {
//     return view('web/content/contact');
// });
// Route::get('/catalog.blade.php', function () {
//     return view('web/content/catalog');
// });


// Route::get('/otp', function () {
//     return view('auth/verify-otp');
// });
// Route::get('/tryon', function () {
//     return view('tryons/index');
// });
// Route::get('/shopkeeper', function () {
//     return view('shopkeeper/index');
// });
// Route::get('/qr-code', function () {
//     return view('qrcodes/index');
// });
// Route::get('/lenses', function () {
//     return view('lense/index');
// });

// Route::get('/start-subscription/{plan}', [SubscriptionController::class, 'start'])
//     ->name('subscription.start');

// Route::get('/login', function () {
//     return view('auth.signup'); // This is your combined login/signup page
// })->name('login');

// Route::get('/after-login-choice', function () {
//     return view('auth.after-login-choice');
// })->name('after-login-choice');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

// Main landing pages
Route::get('/', function () { return view('web.index'); })->name('home');
Route::get('/aboutus', function () { return view('web.content.aboutus'); })->name('aboutus');
Route::get('/features', function () { return view('web.content.feature'); })->name('features');
Route::get('/price', function () { return view('web.content.price'); })->name('pricing');
Route::get('/contact', function () { return view('web.content.contact'); })->name('contact');
Route::get('/catalog', function () { return view('web.content.catalog'); })->name('catalog');

// Combined login/signup page (GET)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/signup', [LoginController::class, 'showLoginForm'])->name('signup.form');

// Auth POST routes (one for each!)
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');

// OTP Verification page (GET)
Route::get('/otp', function () { return view('auth.verify-otp'); })->name('otp');

// Areas protected by session authentication—only for logged-in users
Route::middleware('auth')->group(function () {
    Route::get('/adminboard', function () { return view('admin.adminboard'); })->name('adminboard');
    Route::get('/tryon', function () { return view('tryons.index'); });
    Route::get('/shopkeeper', function () { return view('shopkeeper.index'); });
    Route::get('/qr-code', function () { return view('qrcodes.index'); });
    Route::get('/lenses', function () { return view('lense.index'); });
    Route::get('/adminboard', function () { return view('admin.adminboard'); })->name('adminboard');
    Route::get('/shopkeeper', function () { return view('web.content.shopkeeper'); })->name('shopkeeper.dashboard');
    // Payment gateway page (after login)
    Route::get('/payment/{plan}', [PaymentController::class, 'show'])->name('subscription.payment');
});

// Display the after-login-choice page (only for logged in users)
Route::get('/after-login-choice', function () {
    return view('auth.after-login-choice');
})->middleware('auth')->name('after-login-choice');

// Pricing "Get Started" button flow
Route::get('/start-subscription/{plan}', [SubscriptionController::class, 'start'])
    ->name('subscription.start');

//logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // User management routes
// Route::get('/dashboard', [UserController::class, 'Dashboard'])
//     ->middleware('auth','verified')->name('dashboard');
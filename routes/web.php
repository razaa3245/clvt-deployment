<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\SubscriptionController;
// use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ContactController;

// // Main landing pages
// Route::get('/', function () { return view('web.index'); })->name('home');
// Route::get('/aboutus', function () { return view('web.content.aboutus'); })->name('aboutus');
// Route::get('/features', function () { return view('web.content.feature'); })->name('features');
// Route::get('/price', function () { return view('web.content.price'); })->name('pricing');
// //Route::get('/contact', function () { return view('web.content.contact'); })->name('contact');
// Route::get('/catalog', function () { return view('web.content.catalog'); })->name('catalog');

// // Combined login/signup page (GET)
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/signup', [LoginController::class, 'showLoginForm'])->name('signup.form');

// // Auth POST routes (one for each!)
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/signup', [RegisterController::class, 'register'])->name('signup');

// // OTP Verification page (GET)
// Route::get('/otp', function () { return view('auth.verify-otp'); })->name('otp');

// // // For admin dashboard
// // Route::middleware(['auth'])->get('/adminboard', function () {
// //     return view('admin.adminboard'); // your actual dashboard view path
// // })->name('adminboard');
// Route::get('/admin/adminboard', [AdminController::class, 'dashboard'])->name('admin.adminboard');

// // Areas protected by session authentication—only for logged-in users
// Route::middleware('auth')->group(function () {
//     //Route::get('/adminboard', function () { return view('adminboard'); })->name('admin.adminboard');
//     Route::get('/tryon', function () { return view('tryons.index'); });
//     Route::get('/shopkeeper', function () { return view('shopkeeper.index'); });
//     Route::get('/qr-code', function () { return view('qrcodes.index'); });
//     Route::get('/lenses', function () { return view('lense.index'); });
//     Route::get('/adminboard', function () { return view('admin.adminboard'); })->name('adminboard');
//     Route::get('/shopkeeper', function () { return view('web.content.shopkeeper'); })->name('shopkeeper.dashboard');
//     // Payment gateway page (after login)
//     Route::get('/payment/{plan}', [PaymentController::class, 'show'])->name('subscription.payment');
// });
// Route::get('/admin/board', [AdminController::class, 'dashboard'])->name('admin.adminboard');


// // Display the after-login-choice page (only for logged in users)
// Route::get('/after-login-choice', function () {
//     return view('auth.after-login-choice');
// })->middleware('auth')->name('after-login-choice');

// // Pricing "Get Started" button flow
// Route::get('/start-subscription/{plan}', [SubscriptionController::class, 'start'])
//     ->name('subscription.start');

// //logout route
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // // User management routes
// // Route::get('/dashboard', [UserController::class, 'Dashboard'])
// //     ->middleware('auth','verified')->name('dashboard');

// // show contact page (GET)
// Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
// // process contact form (POST)
// Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
// //Route::post('/contact', [ContactController::class, 'submit']);



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\LensController;

// Static pages only
Route::get('/', fn() => view('web.index'))->name('home');
Route::get('/aboutus', fn() => view('web.content.aboutus'))->name('aboutus');
Route::get('/features', fn() => view('web.content.feature'))->name('features');
Route::get('/price', fn() => view('web.content.price'))->name('pricing');
Route::get('/catalog', fn() => view('web.content.catalog'))->name('catalog');
Route::get('/contact', fn() => view('web.content.contact'))->name('contact');
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Shopkeeper dashboard - uses existing shopkeeper.blade.php
Route::get('/shopkeeper/dashboard', function () {
    return view('shopkeeper.shopkeeper');
})->name('shopkeeper.dashboard');

// Admin dashboard route - corrected to use admindashboard.blade.php
Route::get('/admin/dashboard', function () {
    return view('admin.admindashboard');
})->name('admin.dashboard');

Route::prefix('subscription')->name('subscription.')->group(function () {
    Route::get('/start', [SubscriptionController::class, 'start'])->name('start');
    Route::post('/checkout', [SubscriptionController::class, 'checkout'])->name('checkout');
    Route::get('/success', [SubscriptionController::class, 'success'])->name('success');
    Route::get('/cancel', [SubscriptionController::class, 'cancel'])->name('cancel');
});

Route::get('/admin/messages', function () {
    return view('web.content.messages');
})->name('messages');
//contact page routing
Route::get('/contact', function () {
    return view('web.content.contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/shopkeeper/catalog', [ShopkeeperController::class, 'showCatalog'])->name('shopkeeper.catalog');


Route::get('/price', function () {
    return view('web.content.price'); // adjust path according to your structure
})->name('price');

Route::get('/shopkeeper/catalog1', function () {
    return view('web.content.catalog1'); // adjust path according to your structure
})->name('price');


// Subscription routes
Route::get('/subscription/start', [SubscriptionController::class, 'start'])->name('subscription.start');
Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout')->middleware('auth');
Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');





// Public routes
Route::get('/', function () {
    return view('web.index');
})->name('home');

Route::get('/lenses', [LensController::class, 'index'])->name('lenses.index');

// Admin routes (add authentication middleware in production)
Route::prefix('admin')->group(function () {
    Route::get('/lenses', [LensController::class, 'adminIndex'])->name('admin.lenses.index');
    Route::get('/lenses/create', [LensController::class, 'create'])->name('admin.lenses.create');
    Route::get('/lenses/{id}/edit', [LensController::class, 'edit'])->name('admin.lenses.edit');
});




// In routes/web.php (for admin panel)
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/lenses', LensController::class);
});



// Shopkeeper Approval Routes
Route::get('/shopkeeper-approvals', [ShopkeeperController::class, 'index'])
    ->name('shopkeeper.approvals.index');

Route::get('/shopkeeper-approvals/get-pending', [ShopkeeperController::class, 'getPending'])
    ->name('shopkeeper.approvals.getPending');

Route::post('/shopkeeper-approvals/approve/{id}', [ShopkeeperController::class, 'approve'])
    ->name('shopkeeper.approvals.approve');

Route::post('/shopkeeper-approvals/decline/{id}', [ShopkeeperController::class, 'decline'])
    ->name('shopkeeper.approvals.decline');

Route::get('/shopkeeper-approvals/details/{id}', [ShopkeeperController::class, 'getDetails'])
    ->name('shopkeeper.approvals.details');

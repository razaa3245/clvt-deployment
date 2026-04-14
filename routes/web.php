<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\Stripe2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SecurityQuestionsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\LensController;
use App\Http\Controllers\MController;
use App\Http\Controllers\MembershipPaymentController;

// ═══════════════════════════════════════════════
// PUBLIC STATIC PAGES
// ═══════════════════════════════════════════════
Route::get('/',          fn() => view('web.index'))->name('home');
Route::get('/aboutus',   fn() => view('web.content.aboutus'))->name('aboutus');
Route::get('/features',  fn() => view('web.content.feature'))->name('features');
// Named 'price' to match existing footer/blade references (route('price'))
Route::get('/price',     fn() => view('web.content.price'))->name('price');
Route::get('/price2',    fn() => view('web.content.price2'))->name('price2');
Route::get('/catalog',   fn() => view('web.content.catalog'))->name('catalog');
Route::get('/signup',    fn() => view('auth.signup'))->name('signup');
Route::get('/login',     fn() => view('auth.signup'))->name('login');
Route::post('/login',    [LoginController::class, 'webLogin'])->name('login.post');
Route::post('/logout',   [LoginController::class, 'webLogout'])->name('logout');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/questions', [SecurityQuestionsController::class, 'showQuestionsForm'])->name('password.questions');
Route::post('/password/questions', [SecurityQuestionsController::class, 'verifyAnswers'])->name('password.questions.verify');
Route::get('/password/reset/form', [ResetPasswordController::class, 'showResetFormAfterVerification'])->name('password.reset.form');
Route::post('/password/reset/verified', [ResetPasswordController::class, 'resetVerified'])->name('password.reset.verified');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/contact',   fn() => view('web.content.contact'))->name('contact');
Route::get('/contact-us',fn() => view('web.content.contact'))->name('contactus');

// Contact form submission
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

///TEMP PASS SETUP
Route::get('/setup-admin-secret-xyz123', function () {
    \App\Models\User::where('email', 'test@example.com')
        ->update(['password' => \Illuminate\Support\Facades\Hash::make('admin1234')]);
    return 'Admin password updated!';
});


// ═══════════════════════════════════════════════
// SHOPKEEPER PAGES  (blade views, no auth guard here
//  — auth is handled in JS via localStorage token)
// ═══════════════════════════════════════════════
Route::get('/shopkeeper/dashboard', fn() => view('shopkeeper.shopkeeper'))->name('shopkeeper.dashboard');
Route::get('/shopkeeper/catalog1',  fn() => view('web.content.catalog1'))->name('shopkeeper.catalog1');
Route::get('/shopkeeper/catalog',   [ShopkeeperController::class, 'showCatalog'])->name('shopkeeper.catalog');
Route::get('/shopkeeper/catalog2',  fn() => view('web.content.catalog2'))->name('shopkeeper.catalog2');

// ═══════════════════════════════════════════════
// ADMIN PAGES
// ═══════════════════════════════════════════════
Route::get('/admin/dashboard', fn() => view('admin.admindashboard'))->name('admin.dashboard');
Route::get('/admin/messages',  fn() => view('web.content.messages'))->name('messages');


// ═══════════════════════════════════════════════
// SUBSCRIPTION PAGES
// ═══════════════════════════════════════════════
Route::prefix('subscription')->name('subscription.')->group(function () {
    Route::get('/select',  [SubscriptionController::class, 'select'])->name('select');
    Route::get('/start',   [SubscriptionController::class, 'start'])->name('start');
    Route::post('/checkout',[SubscriptionController::class, 'checkout'])->name('checkout');
    Route::get('/success', [SubscriptionController::class, 'success'])->name('success');
    Route::get('/cancel',  [SubscriptionController::class, 'cancel'])->name('cancel');
});


// ═══════════════════════════════════════════════
// LENS WEB ROUTES (blade views)
// ═══════════════════════════════════════════════
Route::get('/lenses', [LensController::class, 'index'])->name('lenses.index');


// ═══════════════════════════════════════════════
// SHOPKEEPER APPROVAL (admin actions)
// ═══════════════════════════════════════════════
Route::get('/shopkeeper-approvals',           [ShopkeeperController::class, 'index'])->name('shopkeeper.approvals.index');
Route::get('/shopkeeper-approvals/get-pending',[ShopkeeperController::class, 'getPending'])->name('shopkeeper.approvals.getPending');
Route::post('/shopkeeper-approvals/approve/{id}', [ShopkeeperController::class, 'approve'])->name('shopkeeper.approvals.approve');
Route::post('/shopkeeper-approvals/decline/{id}', [ShopkeeperController::class, 'decline'])->name('shopkeeper.approvals.decline');
Route::get('/shopkeeper-approvals/details/{id}',  [ShopkeeperController::class, 'getDetails'])->name('shopkeeper.approvals.details');
Route::post('/shopkeepers/delete/{id}', [ShopkeeperController::class, 'deleteShopkeeper'])->name('shopkeepers.delete');


// ═══════════════════════════════════════════════
// PYTHON AR MODEL ROUTES
// ═══════════════════════════════════════════════
Route::get('/lens',       [MController::class, 'index']);
Route::get('/video_feed', [MController::class, 'stream']);
Route::get('/lens/next',  [MController::class, 'nextLens']);
Route::get('/lens/prev',  [MController::class, 'prevLens']);


// ═══════════════════════════════════════════════
// PAYMENT ROUTES
// ═══════════════════════════════════════════════
Route::get('/stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::post('/stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

// Signup flow
Route::post('/signup/prepare', [RegisterController::class, 'prepare'])->name('signup.prepare');

// Plan selection -> Stripe checkout
Route::get('/subscription/start/{plan}', [SubscriptionController::class, 'start'])->name('subscription.start');

Route::get('/membership',          [MembershipPaymentController::class, 'membership']);
Route::post('/membership-payment', [MembershipPaymentController::class, 'paymentPost'])->name('membership.payment');

Route::get('/stripe2',             [Stripe2Controller::class, 'stripe2']);
Route::post('/stripe2-payment',    [Stripe2Controller::class, 'stripe2Post'])->name('stripe2.post');



// ═══════════════════════════════════════════════
// API ROUTES — PUBLIC (no auth, needed for catalog page)
// ═══════════════════════════════════════════════
// GET /api/lenses — returns JSON list for catalog1.blade.php
Route::get('/api/lenses', [LensController::class, 'apiIndex'])->name('api.lenses');

// ═══════════════════════════════════════════════
// API ROUTES — ADMIN (token-authenticated)
// ═══════════════════════════════════════════════


Route::get('/shopkeeper-approvals/details/{id}', [ShopkeeperController::class, 'getDetails']);


Route::get('/shopkeepers/all', [ShopkeeperController::class, 'getAllShopkeepers']);
Route::post('/shopkeepers/toggle/{id}', [ShopkeeperController::class, 'toggleStatus']);
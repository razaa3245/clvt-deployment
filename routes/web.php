<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.index');
})->name('home');

Route::get('/aboutus.blade.php', function () {
    return view('web/content/aboutus');
});
Route::get('/signup.blade.php', function () {
    return view('web/content/signup');
});
Route::get('/price.blade.php', function () {
    return view('web/content/price');
});
Route::get('/shopkeeper.blade.php', function () {
    return view('web/content/shopkeeper');
});
Route::get('/features.blade.php', function () {
    return view('web/content/feature');
});
Route::get('/adminboard', function () {
    return view('web/content/adminboard');
});
Route::get('/index.blade.php', function () {
    return view('web/index');
});
Route::get('/contact.blade.php', function () {
    return view('web/content/contact');
});
Route::get('/catalog.blade.php', function () {
    return view('web/content/catalog');
});


Route::get('/otp', function () {
    return view('auth/verify-otp');
});
Route::get('/tryon', function () {
    return view('tryons/index');
});
Route::get('/shopkeeper', function () {
    return view('shopkeeper/index');
});
Route::get('/qr-code', function () {
    return view('qrcodes/index');
});
Route::get('/lenses', function () {
    return view('lense/index');
});


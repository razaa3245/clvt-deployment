<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web/index');
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

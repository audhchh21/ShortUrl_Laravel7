<?php

use Illuminate\Support\Facades\Route;

// Auth Route
Auth::routes();

// Main
Route::get('/', 'HomeController@main')->name('main');

// Redirect
Route::get('/{path}', 'ShorturlController@shorturlRedirect')
->where('path', '[a-zA-Z0-9]{5}')->middleware('shorturl');

// Check Password
Route::get('/{path}/check', 'ShorturlController@shorturlPassword')->name('path.pass');
Route::post('/{path}/check/pass', 'ShorturlController@shorturlCheckPassword')->name('path.check.pass');


// Auth Group
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@home')->name('home');
});

// Page Not Found 404
Route::fallback('HomeController@page404');

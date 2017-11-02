<?php

/**
 * Frontend routes.
 */

Auth::routes();

// Prevented routes.
Route::get('register', function () {
    abort(404);
});

Route::get('/', 'FrontendController@index')->name('frontend.index');

// Change language.
Route::get('lang/{locale}', function ($locale) {
    session()->put('appLocale', $locale);
    return redirect()->back();
});

// Authenticated routes.
Route::get('profile', 'UsersController@profile')->name('user.profile');
Route::middleware('front-auth')->group(function () {
    //
});

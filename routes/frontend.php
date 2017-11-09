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
Route::middleware('auth')->group(function () {
    // Users.
    Route::get('profile', 'UsersController@profile')->name('user.profile');
    // Resources.
    Route::get('resources', 'ResourcesController@frontIndex')->name('front-resources');
    Route::get('resources/create', 'ResourcesController@frontCreate')->name('front-resources.create');
    Route::get('resources/{id}/edit', 'ResourcesController@frontEdit')->name('front-resources.edit');
    Route::post('resources', 'ResourcesController@frontStore')->name('front-resources.store');
    Route::put('resources/{id}', 'ResourcesController@frontUpdate')->name('front-resources.update');
    // Ajax requests.
    Route::prefix('ajax')->group(function () {
        // Categories.
        Route::get('/categories/aquired-features/{id}', 'CategoriesController@ajaxFeatures')->name('ajax.categories.aquired-features');
    });
});
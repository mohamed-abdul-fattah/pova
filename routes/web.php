<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin dashboard domain
Route::domain(env('ADMIN_PREFIX', 'staff') .'.'.env('DOMAIN', 'example.com'))->group(function () {
    View::composer('*', function ($view) {
        $intended_url = \Request::path();
        View::share(['view_name' => $view->getName(), 'loggeduser' => Auth::user(), 'intended_url' => $intended_url]);
    });

    Auth::routes();
    Route::impersonate();
    include('hydrogen.php');
});

// Frontend routes.
include('frontend.php');

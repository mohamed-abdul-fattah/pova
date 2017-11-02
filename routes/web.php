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

Auth::routes();
Route::get('register', function () {
    abort(404);
});

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::middleware('front-auth')->group(function () {
    //
});
// Change language.
Route::get('lang/{locale}', function ($locale) {
    session()->put('appLocale', $locale);

    return redirect()->back();
});

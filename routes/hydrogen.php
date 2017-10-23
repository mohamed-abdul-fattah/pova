<?php

Route::any('search', array("as" => 'home.searchingall', 'uses' => '\BaklySystems\Hydrogen\Http\Controllers\HomeController@searchingall'));
Route::get('/accessdenied',array("as"=>'accessdenied','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\HomeController@accessdenied'));
Route::get('/home', '\BaklySystems\Hydrogen\Http\Controllers\HomeController@index')->name('home');
Route::get('/', '\BaklySystems\Hydrogen\Http\Controllers\HomeController@index')->name('root');
Route::any('/notallowed', [
    'as' => 'errors.notallowed',
    'uses' => '\BaklySystems\Hydrogen\Http\Controllers\ErrorsController@notallowed'
]);

include('resources/navItems.php');
include('resources/users.php');
include('resources/notifications.php');
include('resources/categories.php');
include('resources/features.php');
include('resources/acquiredFeatures.php');
include('resources/cities.php');
include('resources/units.php');
include('resources/prices.php');

include('resources/resources.php');
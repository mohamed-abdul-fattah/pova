<?php
Route::any('/navs/{id}/photos/{photoid}',['as'=>'navs.deletePhoto','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\NavsController@deletePhoto']);
Route::resource('navs', '\BaklySystems\Hydrogen\Http\Controllers\NavsController');

Route::any('/nav_items/{id}/photos/{photoid}',['as'=>'nav_items.deletePhoto','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\Nav_itemsController@deletePhoto']);
Route::resource('nav_items', '\BaklySystems\Hydrogen\Http\Controllers\Nav_itemsController');
Route::resource('phototypes', '\BaklySystems\Hydrogen\Http\Controllers\PhototypesController');
Route::resource('photos', '\BaklySystems\Hydrogen\Http\Controllers\PhotosController');
Route::resource('filetypes', '\BaklySystems\Hydrogen\Http\Controllers\FiletypesController');
Route::any('/uploadedfiles/delete/{id}',['as'=>'UploadedfilesController.delete','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UploadedfilesController@delete']);
Route::resource('uploadedfiles', '\BaklySystems\Hydrogen\Http\Controllers\UploadedfilesController');

Route::resource('permissions','\BaklySystems\Hydrogen\Http\Controllers\PermissionsController');
Route::resource('roles','\BaklySystems\Hydrogen\Http\Controllers\RolesController');
Route::resource('navs','\BaklySystems\Hydrogen\Http\Controllers\NavsController');
Route::resource('navItems','\BaklySystems\Hydrogen\Http\Controllers\NavItemsController');
Route::get('/uploadedfiles/delete/{id}', [
    'as' => 'UploadedfilesController.delete', 'uses' => '\BaklySystems\Hydrogen\Http\Controllers\UploadedfilesController@delete'
]);


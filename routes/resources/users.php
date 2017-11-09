<?php

Route::any('users/import',['as'=>'users.import','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@import']);
Route::any('users/importupload',['as'=>'users.importupload','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@importUsers']);
Route::any('users/downloadCsvTemplate',['as'=>'users.downloadCsvTemplate','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@downloadCsvTemplate']);

Route::any('users/changepassword',['as'=>'users.changepassword','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@changePassword']);
Route::post('users/changepasswordsubmit',['as'=>'users.changepasswordsubmit','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@changePasswordSubmit']);

Route::post('/users/changestatus',['as'=> 'users.changestatus','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@changeStatus']);

Route::any('/users/{id}/photos/{photoid}',['as'=>'users.deletePhoto','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@deletePhoto']);
Route::any('/users/{id}/add-comments',['as'=>'users.comments','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\UsersController@addComments']);
Route::resource('users', '\BaklySystems\Hydrogen\Http\Controllers\UsersController');



<?php
Route::get('notifications',['as'=>'notifications','uses'=>'\BaklySystems\Hydrogen\Http\Controllers\HomeController@notifications']);
Route::get('notifications/markAsRead',[
    'as'=>'notifications.markAsRead',
    'uses'=>'\BaklySystems\Hydrogen\Http\Controllers\HomeController@notificationMarkAsRead'
]);
<?php
    /*-----------------------
    | Availabilities
    ------------------------*/
    Route::get('/availabilities/{id}/nested/{details}',['as'=>'availabilities.createNested','uses'=>'AvailabilitiesController@createNested']);
    Route::post('/availabilities/{id}/add-comments',['as'=>'availabilities.comments','uses'=>'AvailabilitiesController@addComments']);
    Route::post('/availabilities/{id}/add-files',['as'=>'availabilities.files','uses'=>'AvailabilitiesController@addFiles']);
    Route::post('/availabilities/{id}/add-photos',['as'=>'availabilities.photos','uses'=>'AvailabilitiesController@addPhotos']);

    Route::get('/availabilities/{id}/photos/{photoid}',['as'=>'availabilities.deletePhoto','uses'=>'AvailabilitiesController@deletePhoto']);
    Route::get('availabilities/batchedit',array('as'=>'availabilities.batchedit','uses'=>'AvailabilitiesController@batchedit'));
    Route::post('availabilities/batchupdate',array('as'=>'availabilities.batchupdate','uses'=>'AvailabilitiesController@batchupdate'));
    Route::resource('availabilities', 'AvailabilitiesController');

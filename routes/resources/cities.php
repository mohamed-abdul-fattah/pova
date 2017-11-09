<?php
    /*-----------------------
    | Cities
    ------------------------*/
    Route::get('/cities/{id}/nested/{details}',['as'=>'cities.createNested','uses'=>'CitiesController@createNested']);
    Route::post('/cities/{id}/add-comments',['as'=>'cities.comments','uses'=>'CitiesController@addComments']);
    Route::post('/cities/{id}/add-files',['as'=>'cities.files','uses'=>'CitiesController@addFiles']);
    Route::post('/cities/{id}/add-photos',['as'=>'cities.photos','uses'=>'CitiesController@addPhotos']);

    Route::get('/cities/{id}/photos/{photoid}',['as'=>'cities.deletePhoto','uses'=>'CitiesController@deletePhoto']);
    Route::get('cities/batchedit',array('as'=>'cities.batchedit','uses'=>'CitiesController@batchedit'));
    Route::post('cities/batchupdate',array('as'=>'cities.batchupdate','uses'=>'CitiesController@batchupdate'));
    Route::resource('cities', 'CitiesController');

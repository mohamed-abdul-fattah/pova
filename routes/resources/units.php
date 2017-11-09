<?php
    /*-----------------------
    | Units
    ------------------------*/
    Route::get('/units/{id}/nested/{details}',['as'=>'units.createNested','uses'=>'UnitsController@createNested']);
    Route::post('/units/{id}/add-comments',['as'=>'units.comments','uses'=>'UnitsController@addComments']);
    Route::post('/units/{id}/add-files',['as'=>'units.files','uses'=>'UnitsController@addFiles']);
    Route::post('/units/{id}/add-photos',['as'=>'units.photos','uses'=>'UnitsController@addPhotos']);

    Route::get('/units/{id}/photos/{photoid}',['as'=>'units.deletePhoto','uses'=>'UnitsController@deletePhoto']);
    Route::get('units/batchedit',array('as'=>'units.batchedit','uses'=>'UnitsController@batchedit'));
    Route::post('units/batchupdate',array('as'=>'units.batchupdate','uses'=>'UnitsController@batchupdate'));
    Route::resource('units', 'UnitsController');

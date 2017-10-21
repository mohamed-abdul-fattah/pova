<?php
    /*-----------------------
    | AcquiredFeatures
    ------------------------*/
    Route::get('/acquired-features/{id}/nested/{details}',['as'=>'acquired-features.createNested','uses'=>'AcquiredFeaturesController@createNested']);
    Route::post('/acquired-features/{id}/add-comments',['as'=>'acquired-features.comments','uses'=>'AcquiredFeaturesController@addComments']);
    Route::post('/acquired-features/{id}/add-files',['as'=>'acquired-features.files','uses'=>'AcquiredFeaturesController@addFiles']);
    Route::post('/acquired-features/{id}/add-photos',['as'=>'acquired-features.photos','uses'=>'AcquiredFeaturesController@addPhotos']);

    Route::get('/acquired-features/{id}/photos/{photoid}',['as'=>'acquired-features.deletePhoto','uses'=>'AcquiredFeaturesController@deletePhoto']);
    Route::get('acquired-features/batchedit',array('as'=>'acquired-features.batchedit','uses'=>'AcquiredFeaturesController@batchedit'));
    Route::post('acquired-features/batchupdate',array('as'=>'acquired-features.batchupdate','uses'=>'AcquiredFeaturesController@batchupdate'));
    Route::resource('acquired-features', 'AcquiredFeaturesController');

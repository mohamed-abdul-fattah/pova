<?php
    /*-----------------------
    | Features
    ------------------------*/
    Route::get('/features/{id}/nested/{details}',['as'=>'features.createNested','uses'=>'FeaturesController@createNested']);
    Route::post('/features/{id}/add-comments',['as'=>'features.comments','uses'=>'FeaturesController@addComments']);
    Route::post('/features/{id}/add-files',['as'=>'features.files','uses'=>'FeaturesController@addFiles']);
    Route::post('/features/{id}/add-photos',['as'=>'features.photos','uses'=>'FeaturesController@addPhotos']);

    Route::get('/features/{id}/photos/{photoid}',['as'=>'features.deletePhoto','uses'=>'FeaturesController@deletePhoto']);
    Route::get('features/batchedit',array('as'=>'features.batchedit','uses'=>'FeaturesController@batchedit'));
    Route::post('features/batchupdate',array('as'=>'features.batchupdate','uses'=>'FeaturesController@batchupdate'));
    Route::resource('features', 'FeaturesController');

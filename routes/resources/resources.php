<?php
    /*-----------------------
    | Resources
    ------------------------*/
    Route::get('/resources/{id}/nested/{details}',['as'=>'resources.createNested','uses'=>'ResourcesController@createNested']);
    Route::post('/resources/{id}/add-comments',['as'=>'resources.comments','uses'=>'ResourcesController@addComments']);
    Route::post('/resources/{id}/add-files',['as'=>'resources.files','uses'=>'ResourcesController@addFiles']);
    Route::post('/resources/{id}/add-photos',['as'=>'resources.photos','uses'=>'ResourcesController@addPhotos']);

    Route::get('/resources/{id}/photos/{photoid}',['as'=>'resources.deletePhoto','uses'=>'ResourcesController@deletePhoto']);
    Route::get('resources/batchedit',array('as'=>'resources.batchedit','uses'=>'ResourcesController@batchedit'));
    Route::post('resources/batchupdate',array('as'=>'resources.batchupdate','uses'=>'ResourcesController@batchupdate'));
    Route::resource('resources', 'ResourcesController');

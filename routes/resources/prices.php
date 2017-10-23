<?php
    /*-----------------------
    | Prices
    ------------------------*/
    Route::get('/prices/{id}/nested/{details}',['as'=>'prices.createNested','uses'=>'PricesController@createNested']);
    Route::post('/prices/{id}/add-comments',['as'=>'prices.comments','uses'=>'PricesController@addComments']);
    Route::post('/prices/{id}/add-files',['as'=>'prices.files','uses'=>'PricesController@addFiles']);
    Route::post('/prices/{id}/add-photos',['as'=>'prices.photos','uses'=>'PricesController@addPhotos']);

    Route::get('/prices/{id}/photos/{photoid}',['as'=>'prices.deletePhoto','uses'=>'PricesController@deletePhoto']);
    Route::get('prices/batchedit',array('as'=>'prices.batchedit','uses'=>'PricesController@batchedit'));
    Route::post('prices/batchupdate',array('as'=>'prices.batchupdate','uses'=>'PricesController@batchupdate'));
    Route::resource('prices', 'PricesController');

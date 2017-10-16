<?php
    /*-----------------------
    | Categories
    ------------------------*/
    Route::get('/categories/{id}/nested/{details}',['as'=>'categories.createNested','uses'=>'CategoriesController@createNested']);
    Route::post('/categories/{id}/add-comments',['as'=>'categories.comments','uses'=>'CategoriesController@addComments']);
    Route::post('/categories/{id}/add-files',['as'=>'categories.files','uses'=>'CategoriesController@addFiles']);
    Route::post('/categories/{id}/add-photos',['as'=>'categories.photos','uses'=>'CategoriesController@addPhotos']);

    Route::get('/categories/{id}/photos/{photoid}',['as'=>'categories.deletePhoto','uses'=>'CategoriesController@deletePhoto']);
    Route::get('categories/batchedit',array('as'=>'categories.batchedit','uses'=>'CategoriesController@batchedit'));
    Route::post('categories/batchupdate',array('as'=>'categories.batchupdate','uses'=>'CategoriesController@batchupdate'));
    Route::resource('categories', 'CategoriesController');

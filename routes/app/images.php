<?php

Route::group(['prefix' => 'images'], function () {

    Route::get('/listado', [
        'as' => 'images.index',
        'uses' => 'ImageController@index',
    ]);

    Route::post('/{id}/nueva', [
        'as' => 'images.store',
        'uses' => 'ImageController@store',
    ]);

    Route::get('ver/{file}', [
        'as' => 'images.see',
        'uses' => 'ImageController@seeImage'
    ]);

    Route::get('{id}/{model}/{modelId}/principal', [
        'as' => 'images.main',
        'uses' => 'ImageController@main'
    ]);

    Route::delete('{id}/eliminar', [
        'as' => 'images.delete',
        'uses' => 'ImageController@deleteImage'
    ]);

});

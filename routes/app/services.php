<?php

Route::group(['prefix' => 'servicios'], function () {

    Route::get('/listado', [
        'as' => 'services.index',
        'uses' => 'ServicesController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'services.create',
        'uses' => 'ServicesController@create',
    ]);

    Route::post('/crear', [
        'as' => 'services.store',
        'uses' => 'ServicesController@store',
    ]);

    Route::get('/{id}/ver', [
        'as' => 'services.show',
        'uses' => 'ServicesController@show',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'services.edit',
        'uses' => 'ServicesController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'services.update',
        'uses' => 'ServicesController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'services.destroy',
        'uses' => 'ServicesController@destroy',
    ]);

});

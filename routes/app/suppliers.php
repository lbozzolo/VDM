<?php

Route::group(['prefix' => 'proveedores'], function () {

    Route::get('/listado', [
        'as' => 'suppliers.index',
        'uses' => 'SuppliersController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'suppliers.create',
        'uses' => 'SuppliersController@create',
    ]);

    Route::post('/nuevo', [
        'as' => 'suppliers.store',
        'uses' => 'SuppliersController@store',
    ]);

    Route::get('{id}/detalles', [
        'as' => 'suppliers.show',
        'uses' => 'SuppliersController@show',
    ]);

    Route::get('{id}/editar', [
        'as' => 'suppliers.edit',
        'uses' => 'SuppliersController@edit',
    ]);

    Route::put('{id}/actualizar', [
        'as' => 'suppliers.update',
        'uses' => 'SuppliersController@update',
    ]);

    Route::delete('/eliminaar', [
        'as' => 'suppliers.destroy',
        'uses' => 'SuppliersController@destroy',
    ]);

});
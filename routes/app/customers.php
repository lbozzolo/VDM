<?php

Route::group(['prefix' => 'clientes'], function () {

    Route::get('/listado', [
        'as' => 'customers.index',
        'uses' => 'CustomersController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'customers.create',
        'uses' => 'CustomersController@create',
    ]);

    Route::post('/crear', [
        'as' => 'customers.store',
        'uses' => 'CustomersController@store',
    ]);

    Route::get('/{id}/ver', [
        'as' => 'customers.show',
        'uses' => 'CustomersController@show',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'customers.edit',
        'uses' => 'CustomersController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'customers.update',
        'uses' => 'CustomersController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'customers.destroy',
        'uses' => 'CustomersController@destroy',
    ]);

});

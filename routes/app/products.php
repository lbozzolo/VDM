<?php

Route::group(['prefix' => 'productos'], function () {

    Route::get('/listado', [
        'as' => 'products.index',
        'uses' => 'ProductsController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'products.create',
        'uses' => 'ProductsController@create',
    ]);

    Route::post('/crear', [
        'as' => 'products.store',
        'uses' => 'ProductsController@store',
    ]);

    Route::get('/{id}/ver', [
        'as' => 'products.show',
        'uses' => 'ProductsController@show',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'products.edit',
        'uses' => 'ProductsController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'products.update',
        'uses' => 'ProductsController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'products.destroy',
        'uses' => 'ProductsController@destroy',
    ]);

});

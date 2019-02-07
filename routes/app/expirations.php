<?php

Route::group(['prefix' => 'expirations'], function () {

    Route::post('/nuevo', [
        'as' => 'expirations.store',
        'uses' => 'ExpirationsController@store',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'expirations.update',
        'uses' => 'ExpirationsController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'expirations.destroy',
        'uses' => 'ExpirationsController@destroy',
    ]);

});

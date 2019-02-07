<?php

Route::group(['prefix' => 'phases'], function () {

    Route::get('/listado', [
        'as' => 'phases.index',
        'uses' => 'PhasesController@index',
    ]);

    Route::post('/crear', [
        'as' => 'phases.store',
        'uses' => 'PhasesController@store',
    ]);

    Route::delete('/eliminar', [
        'as' => 'phases.delete',
        'uses' => 'PhasesController@delete',
    ]);

});
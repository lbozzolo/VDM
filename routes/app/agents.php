<?php

Route::group(['prefix' => 'intermediarios'], function () {

    Route::get('/listado', [
        'as' => 'agents.index',
        'uses' => 'AgentsController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'agents.create',
        'uses' => 'AgentsController@create',
    ]);

    Route::post('/crear', [
        'as' => 'agents.store',
        'uses' => 'AgentsController@store',
    ]);

    Route::get('/{id}/ver', [
        'as' => 'agents.show',
        'uses' => 'AgentsController@show',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'agents.edit',
        'uses' => 'AgentsController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'agents.update',
        'uses' => 'AgentsController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'agents.destroy',
        'uses' => 'AgentsController@destroy',
    ]);

});

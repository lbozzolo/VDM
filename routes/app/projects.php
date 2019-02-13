<?php

Route::group(['prefix' => 'proyectos'], function () {

    Route::get('/listado', [
        'as' => 'projects.index',
        'uses' => 'ProjectsController@index',
    ]);

    Route::get('/listado-tabla', [
        'as' => 'projects.index.table',
        'uses' => 'ProjectsController@indexTable',
    ]);

    Route::get('/nuevo', [
        'as' => 'projects.create',
        'uses' => 'ProjectsController@create',
    ]);

    Route::post('/nuevo', [
        'as' => 'projects.store',
        'uses' => 'ProjectsController@store',
    ]);

    Route::get('/{id}/detalles', [
        'as' => 'projects.show',
        'uses' => 'ProjectsController@show',
    ]);

    Route::delete('/eliminar', [
        'as' => 'projects.destroy',
        'uses' => 'ProjectsController@destroy',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'projects.edit',
        'uses' => 'ProjectsController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'projects.update',
        'uses' => 'ProjectsController@update',
    ]);

//    Route::post('/{id}/nuevo-presupuesto', [
//        'as' => 'projects.store.budget',
//        'uses' => 'ProjectsController@storeBudget',
//    ]);

    Route::get('ver-pdf/{file}', [
        'as' => 'projects.seepdf',
        'uses' => 'ProjectsController@seePdf'
    ]);

    Route::put('/{id}/estado-presupuesto', [
        'as' => 'projects.state.budget',
        'uses' => 'ProjectsController@stateBudget',
    ]);

    // Anexos

    Route::get('/{id}/vencimientos', [
        'as' => 'projects.expirations',
        'uses' => 'ProjectsController@expirations',
    ]);

    Route::get('/{id}/imágenes', [
        'as' => 'projects.images',
        'uses' => 'ProjectsController@images',
    ]);

    Route::get('/{id}/presupuestos', [
        'as' => 'projects.budgets',
        'uses' => 'ProjectsController@budgets',
    ]);


});

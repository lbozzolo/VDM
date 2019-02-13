<?php

Route::group(['prefix' => 'presupuestos'], function () {

    Route::get('/listado', [
        'as' => 'budgets.index',
        'uses' => 'BudgetsController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'budgets.create',
        'uses' => 'BudgetsController@create',
    ]);

    Route::post('/nuevo', [
        'as' => 'budgets.store',
        'uses' => 'BudgetsController@store',
    ]);

    Route::delete('/eliminar', [
        'as' => 'budgets.destroy',
        'uses' => 'BudgetsController@destroy',
    ]);

});

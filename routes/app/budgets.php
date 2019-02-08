<?php

Route::group(['prefix' => 'presupuestos'], function () {

    Route::delete('/eliminar', [
        'as' => 'budgets.destroy',
        'uses' => 'BudgetsController@destroy',
    ]);

});

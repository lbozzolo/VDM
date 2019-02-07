<?php

Route::group(['prefix' => 'contactos'], function () {

    Route::get('/listado', [
        'as' => 'contacts.index',
        'uses' => 'ContactsController@index',
    ]);

    Route::get('/nuevo', [
        'as' => 'contacts.create',
        'uses' => 'ContactsController@create',
    ]);

    Route::post('/crear', [
        'as' => 'contacts.store',
        'uses' => 'ContactsController@store',
    ]);

    Route::get('/{id}/ver', [
        'as' => 'contacts.show',
        'uses' => 'ContactsController@show',
    ]);

    Route::get('/{id}/editar', [
        'as' => 'contacts.edit',
        'uses' => 'ContactsController@edit',
    ]);

    Route::put('/{id}/actualizar', [
        'as' => 'contacts.update',
        'uses' => 'ContactsController@update',
    ]);

    Route::delete('/eliminar', [
        'as' => 'contacts.destroy',
        'uses' => 'ContactsController@destroy',
    ]);

});

<?php

Route::group(['prefix' => 'proyectos'], function () {


    Route::get('/nuevo', [
        'as' => 'projects.create',
        'uses' => 'ProjectsController@create',
    ]);


});

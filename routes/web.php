<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');





Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'HomeController@index')->name('home');

    require(__DIR__ . '/app/projects.php');
    require(__DIR__ . '/app/phases.php');
    require(__DIR__ . '/app/customers.php');
    require(__DIR__ . '/app/images.php');
    require(__DIR__ . '/app/expirations.php');
    require(__DIR__ . '/app/contacts.php');
    require(__DIR__ . '/app/budgets.php');
    require(__DIR__ . '/app/suppliers.php');
    require(__DIR__ . '/app/products.php');

});


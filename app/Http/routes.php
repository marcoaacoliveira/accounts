<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','AccountsController@index');



Route::delete('/charges/{charge}', 'ChargesController@delete');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::delete('/accounts/{account}', 'AccountsController@delete');
Route::group(['middleware' => ['web']], function () {
    Route::get('/charges/{account}', 'ChargesController@create');
    Route::get('/charges/{account}/show/{charge}', 'ChargesController@show');
    Route::get('/installments/{installment}/pay', 'InstallmentsController@pay');
    Route::post('/charges/{account}', 'ChargesController@store');
    Route::resource('accounts', 'AccountsController');

});

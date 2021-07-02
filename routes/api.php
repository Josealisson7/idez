<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/user')->group(function () {
    Route::post('', 'UserController@register');
});

Route::prefix('/businessAccount')->group(function () {
    Route::post('/user/{id}', 'BusinessAccountController@register');
    Route::get('/{id}', 'BusinessAccountController@find');
});

Route::prefix('/personalAccount')->group(function () {
    Route::post('/user/{id}', 'PersonalAccountController@register');
    Route::get('/{id}', 'PersonalAccountController@find');
});

Route::prefix('/transation')->group(function () {
    Route::prefix('/deposit')->group(function () {
        Route::post('/businessAccount/{id}', 'DepositController@registerForBusinessAccount');
    });

  //  Route::get('/{id}', 'PersonalAccountController@find');
});

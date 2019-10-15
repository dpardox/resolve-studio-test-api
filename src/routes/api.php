<?php

use Illuminate\Http\Request;

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::middleware('auth:api')->group(function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::namespace('Auth')->prefix('password')->group(function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::resource('users', 'UserController');

Route::resource('companies', 'CompanyController');

// Sources
Route::get('sources', 'SourceController@list');
Route::post('sources', 'SourceController@store');
Route::get('sources/{source}', 'SourceController@show');

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

// Users
Route::get('users', 'UserController@list');
Route::post('users', 'UserController@store');
Route::get('users/admins', 'UserController@admins');
Route::get('users/{user}', 'UserController@show');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/{user}', 'UserController@update');

// Companies
Route::get('companies', 'CompanyController@list');
Route::post('companies', 'CompanyController@store');
Route::get('companies/admin/{user}', 'CompanyController@admin');
Route::get('companies/{company}', 'CompanyController@show');
Route::put('companies/{company}', 'CompanyController@update');
Route::delete('companies/{company}', 'CompanyController@update');

// Sources
Route::get('sources', 'SourceController@list');
Route::post('sources', 'SourceController@store');
Route::get('sources/admin/{user}', 'SourceController@admin');
Route::get('sources/{source}', 'SourceController@show');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'App\Http\Controllers\AuthenticatorContrller@login');
Route::post('signup', 'App\Http\Controllers\AuthenticatorContrller@signup');
Route::middleware('auth:api')->group(function() {
    Route::post('logout', 'App\Http\Controllers\AuthenticatorContrller@logout');
});

Route::get('articles/{id}', 'App\Http\Controllers\ArticlesController@show');
Route::get('articles', 'App\Http\Controllers\ArticlesController@index');
Route::post('articles', 'App\Http\Controllers\ArticlesController@store');
Route::put('articles/{id}', 'App\Http\Controllers\ArticlesController@update');
Route::get('/categories/{id}/articles', 'App\Http\Controllers\ArticlesController@getByCategoy');
Route::put('text/{content}', 'App\Http\Controllers\ArticlesController@getByText');
Route::delete('destroy/{id}', 'App\Http\Controllers\ArticlesController@destroy');

Route::get('categories', 'App\Http\Controllers\CategoryController@index');
Route::get('categories/{id}', 'App\Http\Controllers\CategoryController@show');
Route::post('/categories', 'App\Http\Controllers\CategoryController@store');
Route::put('/categories/{id}', 'App\Http\Controllers\CategoryController@update');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy');

Route::get('users', 'App\Http\Controllers\UsersController@index');
Route::post('/users', 'App\Http\Controllers\UsersController@store');
Route::put('/users/{id}', 'App\Http\Controllers\UsersController@update');
Route::delete('/users/{id}', 'App\Http\Controllers\UsersController@destroy');


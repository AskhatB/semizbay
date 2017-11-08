<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', 'UserController@index');

Route::post('user/create' , 'UserController@create');

Route::put('user/{id}', 'UserController@update');

Route::get('/user/{id}', 'UserController@show');

Route::delete('user/{id}', 'UserController@delete');

<?php


Route::get('/', 'MainController@listen');
Route::post('/', 'MainController@listen');

Route::get('/about', 'MainController@index');

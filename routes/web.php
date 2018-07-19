<?php


Route::post('/bot', 'MainController@listen');

Route::get('/', 'MainController@index');

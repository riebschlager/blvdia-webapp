<?php

Route::get('/', 'WelcomeController@index');

Route::get('admin', 'AdminController@index');

Route::resource('photo', 'PhotoController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

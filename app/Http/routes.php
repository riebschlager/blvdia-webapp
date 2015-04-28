<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('photo', 'PhotoController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

<?php

Route::get('/', 'WelcomeController@index');

Route::get('admin', 'AdminController@index');

Route::resource('photo', 'PhotoController');

Route::get('/api/photos', 'PhotoController@allPhotos');
Route::get('/api/photos/featured', 'PhotoController@featuredPhotos');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

<?php

Route::get('/', 'WelcomeController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/photos', 'AdminController@photos');

Route::resource('photo', 'PhotoController');

Route::get('/api/photos', 'PhotoController@allPhotos');
Route::get('/api/photos/featured', 'PhotoController@featuredPhotos');
Route::post('/api/photos/feature', 'PhotoController@feature');
Route::post('/api/photos/unfeature', 'PhotoController@unfeature');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

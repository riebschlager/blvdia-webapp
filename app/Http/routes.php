<?php

Route::get('/', 'WelcomeController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/photos', 'AdminController@photos');

Route::get('player/{id}', 'PhotoController@showPlayer');
Route::resource('photo', 'PhotoController');

Route::get('/api/photos', 'PhotoController@allPhotos');
Route::get('/api/photos/featured', 'PhotoController@featuredPhotos');
Route::get('/api/photos/random', 'PhotoController@randomAll');
Route::get('/api/photos/random-featured', 'PhotoController@randomFeatured');
Route::post('/api/photos/feature', 'PhotoController@feature');
Route::post('/api/photos/unfeature', 'PhotoController@unfeature');

Route::get('/collage', 'PhotoController@collage');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

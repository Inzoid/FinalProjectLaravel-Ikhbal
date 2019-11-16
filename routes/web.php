<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'JobController@index');

//route signup atau register user
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');


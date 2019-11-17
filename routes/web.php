<?php

Route::get('/', function () {
    return view('users.login');
});

//route admin
Route::get('/admin', 'AdminController@index');
Route::get('/table', 'AdminController@show');

//route signup atau register user
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');

//route login
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

//Forgot password
Route::get('/forgot-password', 'ReminderController@create')->name('email.create');
Route::post('/forgot-password', 'ReminderController@store')->name('email.store');

//Reset password
Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminder.edit');
Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminder.update');
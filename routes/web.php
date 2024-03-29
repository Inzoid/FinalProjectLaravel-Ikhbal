<?php

Route::get('/', function () {
    return view('users.login');
});

//route admin
Route::group(['prefix' => 'admin', 'middleware' => ['sentinel', 'hasAdmin'] ],
function () {
    Route::resource('/admin', 'AdminController');
    Route::get('/dashboard', 'AdminController@index')->name('admin');
    Route::get('/table', 'AdminController@show')->name('user');
    Route::get('/create', 'AdminController@create')->name('create');
    Route::post('/create', 'AdminController@store')->name('create.user');
    Route::get('/edit', 'AdminController@edit')->name('edit.user');
    Route::get('/card', 'AdminController@card')->name('edit.user');
    Route::get('/status.apply','ApplyController@edit')->name('apply');
    //Company
    Route::resource('/company', 'CompanyController');
    Route::get('company', 'CompanyController@index')->name('company');
    Route::get('create_company', 'CompanyController@create')->name('create.company');
    Route::post('create_company', 'CompanyController@store')->name('company.store');
    Route::get('/edit_company/{id}', 'CompanyController@edit')->name('company.edit');
    Route::put('/edit_company/{id}', 'CompanyController@update')->name('company.update');
    Route::get('job', 'CompanyController@job')->name('company.job');

});


//route signup atau register user
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');

//route login
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout.admin');

//Forgot password
Route::get('/forgot-password', 'ReminderController@create')->name('email.create');
Route::post('/forgot-password', 'ReminderController@store')->name('email.store');

//Reset password
Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminder.edit');
Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminder.update');

//Biodata
Route::resource('/biodata', 'BiodataController');
Route::get('biodata', 'BiodataController@index')->name('biodata');
Route::get('show.biodata', 'BiodataController@show')->name('biodata.show');

//User Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'DashboardController@profile')->name('profile');
Route::get('/logout.user', 'DashboardController@logout')->name('logout.user');
Route::resource('/apply', 'ApplyController');
Route::post('apply/{id}', 'ApplyController@store')->name('apply.buat');
Route::get('status.pelamar', 'DashboardController@show')->name('status.pelamar');

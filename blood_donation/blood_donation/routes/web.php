<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('Admin.Admins.index');
});*/

Route::group(['prefix'=>'admin'],function(){

	//Route::any('/','Admin\AdminsController@login');

	Route::get('/index','Admin\AdminsController@index');
	Route::get('/users','Admin\UsersController@index');
	Route::get('/users/add','Admin\UsersController@add');
	Route::post('/users/addUser','Admin\UsersController@addUser');
	Route::get('/users/edit/{id}','Admin\UsersController@edit');
	Route::post('/users/editUser','Admin\UsersController@editUser');
	Route::get('/users/delete/{id}','Admin\UsersController@delete');

	Route::get('/','Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/','Admin\LoginController@login');

	Route::post('password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset','Admin\ResetPasswordController@reset');
	Route::get('password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


	Route::get('/profile','Admin\AdminsController@profile')->name('admin.profile');
	Route::get('/edit_profile','Admin\AdminsController@ShowEditProfileForm')->name('admin.edit_profile');
	Route::post('/edit_profile','Admin\AdminsController@editProfile')->name('admin.updateProfile');
	
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){

    Route::get('/login','Admins\AdminsLoginController@adminLoginForm')->name('login.admin');
    Route::post('/login','Admins\AdminsLoginController@login')->name('login.admin.submit');
    Route::get('/','Admins\AdminsController@main')->name('admin.main');
    Route::get('/adminlogout','Admins\AdminsLoginController@logout')->name('logout.admin');
    Route::get('/usersshow', 'Users\UsersController@usersshow')->name('users.view')->middleware('auth:admin');
});

Route::get('/userlogout','Auth\LoginController@user_logout')->name('logout.user');
Route::resource('/users','Users\UsersController');

Route::post('/picture','Users\UsersController@updatePic')->name('users.pic')->middleware('auth');
Route::post('/message/{id}','Users\UsersController@sendMessages')->name('users.message')->middleware('auth');
Route::get('/message/{id}','Users\UsersController@showMessages')->name('users.message.show')->middleware('auth');
Route::get('/registerUser','Auth\RegisterController@regForm')->name('register.user')->middleware('auth');
Route::post('/search','Users\UsersController@browse')->name('users.search');
Route::resource('/report','Reports\ReportsController');
Route::get('/block/{id}','Users\UsersController@block')->name('block');
Route::get('/search','HomeController@find')->name('users.find');
Route::resource('/likes','Likes\LikesController');
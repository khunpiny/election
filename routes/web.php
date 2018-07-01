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

Route::get('/admin/score', function () {
    return view('admin/admin_score');
});

Route::get('/master/add', function () {
    return view('master/master_add');
});

Auth::routes();
// master
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/master/home', 'HomeController@show');
});
//admin
Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'AuthAdmin\LoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.home');
});
//header
Route::group(['prefix' => 'header'], function(){
  Route::get('/login', 'AuthHeader\LoginController@ShowLoginForm')->name('header.login');
  Route::post('/login', 'AuthHeader\LoginController@login')->name('header.login.submit');
  Route::get('/', 'HeaderController@index')->name('header.home');
});

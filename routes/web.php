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
Route::get('/admin','LoginController@index');
Route::post('/admin/login-submit','LoginController@login_submit');
Route::group(['middleware' => ['admin']], function() {
   Route::get('/admin/dashboard','DashboardController@index');
   Route::get('/admin/logout','LoginController@logout');
   Route::get('/admin/profile','DashboardController@profile');
   Route::get('/admin/banner','BannerController@index');
   Route::post('/admin/profile-submit','DashboardController@profile_submit');
   
   
});

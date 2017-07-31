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
   Route::post('/admin/profile-submit','DashboardController@profile_submit');
   

   /**************Banner***********************/

   Route::get('/admin/banner','BannerController@index');
   Route::get('/admin/banner/add','BannerController@add');
   Route::post('/admin/banner/store','BannerController@store');
   Route::get('/admin/banner/edit/{id}','BannerController@edit');
   Route::post('/admin/banner/update/{id}','BannerController@update');
   Route::get('/admin/banner/delete/{id}','BannerController@delete');

   /***************End**************************/

   /****************Category********************/

   Route::resource('/admin/categories', 'CategoryController');
   Route::get('/admin/categories/delete/{id}', ['uses' => 'CategoryController@destroy']);
   Route::post('/admin/categories/update/{id}', ['uses' => 'CategoryController@update']);

   /****************End*************************/
   
});

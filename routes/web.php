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

   /*****************Sub-Category*******************/

   Route::resource('/admin/sub-categories','SubCategoryController');
   Route::get('/admin/sub-categories/delete/{id}', ['uses' => 'SubCategoryController@destroy']);
   Route::post('/admin/sub-categories/update/{id}', ['uses' => 'SubCategoryController@update']);

   /*******************End*************************/

   /*****************Brand*********************************/

   Route::resource('/admin/brands','BrandController');
   Route::get('/admin/brands/delete/{id}', ['uses' => 'BrandController@destroy']);
   Route::post('/admin/brands/update/{id}', ['uses' => 'BrandController@update']);

   /*****************End***********************************/

   /**********************Tag******************************/

   Route::resource('/admin/tags','TagController');
   Route::get('/admin/tags/delete/{id}', ['uses' => 'TagController@destroy']);
   Route::post('/admin/tags/update/{id}', ['uses' => 'TagController@update']);

   /**********************End******************************/


   /**********************Unit******************************/

   Route::resource('/admin/units','UnitController');
   Route::get('/admin/units/delete/{id}', ['uses' => 'UnitController@destroy']);
   Route::post('/admin/units/update/{id}', ['uses' => 'UnitController@update']);

   /**********************End******************************/


   /**********************Product******************************/

   Route::resource('/admin/products','ProductController');
   Route::get('/admin/products/delete/{id}', ['uses' => 'ProductController@destroy']);
   Route::post('/admin/products/update/{id}', ['uses' => 'ProductController@update']);
   Route::get('/admin/products/gallery/{id}', ['uses' => 'ProductController@gallery']);
   Route::get('/admin/products/get-gallery/{id}',['uses' => 'ProductController@get_gallery']);
   Route::get('/admin/products/remove-gallery-image/{file_name}/{product_id}','ProductController@remove_gallery_image');
   Route::post('/admin/products/store-gallery', ['uses' => 'ProductController@store_gallery']);

   /**********************End******************************/


   /**************************Vendor*************************/

   Route::resource('/admin/vendors','VendorController');
   Route::post('/admin/vendors/get-states/', 'VendorController@get_states');
   Route::post('/admin/vendors/update/{id}', ['uses' => 'VendorController@update']);
   Route::get('/admin/vendors/delete/{id}', ['uses' => 'VendorController@destroy']);
   
   /**************************End****************************/

   /**************************Region*************************/

     Route::get('/admin/regions','RegionController@index');
     Route::post('/admin/regions/get-states/', 'VendorController@get_states');
     Route::get('/admin/regions/add','RegionController@add');
     Route::post('/admin/regions/store','RegionController@store');
     Route::get('/admin/regions/edit/{id}','RegionController@edit');
     Route::post('/admin/regions/update','RegionController@update');
     Route::get('/admin/regions/delete/{id}','RegionController@delete');
   
   /**************************End*************************/

   /**************************Orders***********************/
     Route::get('/admin/orders','OrderController@index');
     Route::get('/admin/orders/add','OrderController@add');
     Route::post('/admin/orders/store','OrderController@store');
     Route::get('/admin/orders/edit/{id}','OrderController@edit');
     Route::post('/admin/orders/update','OrderController@update');
     Route::get('/admin/orders/delete/{id}','OrderController@delete');

   /*************************end****************************/

    /**************************Warehouse***********************/

    Route::get('/admin/warehouse','WarehouseController@index');
    Route::get('/admin/warehouse/add','WarehouseController@add');
    Route::post('/admin/warehouse/store','WarehouseController@store');
    Route::get('/admin/warehouse/edit/{id}','WarehouseController@edit');
    Route::post('/admin/warehouse/update','WarehouseController@update');
    Route::get('/admin/warehouse/delete/{id}','WarehouseController@delete');

     /*************************end****************************/
});

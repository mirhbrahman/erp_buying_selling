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

// Admin area
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // User role
    Route::resource('user-roles', 'Admin\UserRole\UserRolesController')->except(['show']);
    Route::get('user-roles/delete/{user_role}', 'Admin\UserRole\UserRolesController@destroy')->name('user-roles.destroy');
    // User
    Route::resource('users', 'Admin\User\UsersController')->except(['show']);
    Route::get('users/delete/{user}', 'Admin\User\UsersController@destroy')->name('users.destroy');
    Route::get('users/verify/{user}', 'Admin\User\UsersController@verifyByAdmin')->name('users.verifyByAdmin');
    // System location
    Route::resource('sys-country', 'Admin\Location\SysCountriesController');
    Route::resource('sys-division', 'Admin\Location\SysDivisionsController');
    Route::resource('sys-city', 'Admin\Location\SysCitiesController');
    Route::resource('sys-police-station', 'Admin\Location\SysPoliceStationsController');
    Route::resource('sys-word', 'Admin\Location\SysWordsController');
    Route::resource('sys-village', 'Admin\Location\SysVillagesController');
    // E-wallet
    Route::resource('e-wallet', 'Admin\Bank\EWallet\EWalletsController', ['except' => ['create', 'show']]);
    // Mobile bank
    Route::resource('mobile-bank', 'Admin\Bank\MobileBank\MobileBanksController', ['except' => ['create', 'show']]);
    // Product section
    // Type
    Route::resource('product-section-type', 'Admin\ProductSection\Type\SysProductTypesController');
    Route::get('product-section-type/delete/{id}', 'Admin\ProductSection\Type\SysProductTypesController@destroy')->name('product-section-type.destroy');
    //Category
    Route::resource('product-section-category', 'Admin\ProductSection\Category\SysProductCategoriesController');
    Route::get('product-section-category/delete/{id}', 'Admin\ProductSection\Category\SysProductCategoriesController@destroy')->name('product-section-category.destroy');
    //Sub category
    Route::resource('product-section-sub-category', 'Admin\ProductSection\SubCategory\SysProductSubCategoriesController');
    Route::get('product-section-sub-category/delete/{id}', 'Admin\ProductSection\SubCategory\SysProductSubCategoriesController@destroy')->name('product-section-sub-category.destroy');
    Route::get('category-by-ajax', 'Admin\ProductSection\SubCategory\SysProductSubCategoriesController@getCategoryAjax')->name('category-ajax');
    // Product accessories
    // Brand
    Route::resource('product-accessories-brand', 'Admin\ProductAccessories\Brand\SysProductBrandsController');
    Route::get('product-accessories-brand/delete/{id}', 'Admin\ProductAccessories\Brand\SysProductBrandsController@destroy')->name('product-accessories-brand.destroy');
    // Size
    Route::resource('product-accessories-size', 'Admin\ProductAccessories\Size\SysProductSizesController');
    Route::get('product-accessories-size/delete/{id}', 'Admin\ProductAccessories\Size\SysProductSizesController@destroy')->name('product-accessories-size.destroy');
    // Color
    Route::resource('product-accessories-color', 'Admin\ProductAccessories\Color\SysProductColorsController');
    Route::get('product-accessories-color/delete/{id}', 'Admin\ProductAccessories\Color\SysProductColorsController@destroy')->name('product-accessories-color.destroy');
    // Location
    Route::resource('product-location', 'User\Location\UserLocationsController');
    Route::get('division', 'User\Location\UserLocationsController@getDivision')->name('division');
    Route::get('city', 'User\Location\UserLocationsController@getCity')->name('city');
    Route::get('policeStation', 'User\Location\UserLocationsController@getPoliceStation')->name('policeStation');
    Route::get('word', 'User\Location\UserLocationsController@getWord')->name('word');
    Route::get('village', 'User\Location\UserLocationsController@getVillage')->name('village');

});



// System location
Route::group(['middleware' => 'auth'], function () {
    //.........get location for select option [ajax]
    Route::post('get-sys-division', 'PublicLocation\SysLocationController@getDivision')->name('getSysDivision');
    Route::post('get-sys-city', 'PublicLocation\SysLocationController@getCity')->name('getSysCity');
    Route::post('get-sys-police-station', 'PublicLocation\SysLocationController@getPoliceStation')->name('getSysPoliceStation');
    Route::post('get-sys-word', 'PublicLocation\SysLocationController@getWord')->name('getSysWord');
    Route::post('get-sys-village', 'PublicLocation\SysLocationController@getVillage')->name('getSysVillage');
});

// User location
Route::group(['prefix'=> 'user','middleware' => 'auth'], function () {
    Route::resource('user-location', 'User\Location\UserLocationsController')->only(['index','create','store']);
});

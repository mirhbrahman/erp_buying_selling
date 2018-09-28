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

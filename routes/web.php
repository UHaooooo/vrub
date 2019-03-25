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

Route::get('/', 'PageController@getHome');

Route::get('/newVehicleRegistration', 'PageController@getNewVehicleRegistration');

Route::get('/editVehicleRegistrationInformation', 'PageController@getEditVehicleRegistrationInformation');

Route::get('/transferVehicleOwnership', 'PageController@getTransferVehicleOwnership');

Route::get('/vehicleLicense', 'PageController@getVehicleLicense');

Route::get('/vehicleInsurance', 'PageController@getVehicleInsurance');

Route::get('/vehicleRegistrationNumber', 'PageController@getVehicleRegistrationNumber');

Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

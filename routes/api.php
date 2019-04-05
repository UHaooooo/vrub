<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('citizens', 'CitizenController');

//Route::apiResource('areas', 'AreaController');
Route::get('areas/latest_number', 'AreaController@latestNumber');

Route::apiResource('vehicles', 'VehicleController');

Route::post('changeVehicleRegistrationNumber/{vehicles}', 'VehicleController@changeVehicleRegistrationNumber');

Route::post('revertChangeVehicleRegistrationNumber/{vehicles}', 'VehicleController@revertChangeVehicleRegistrationNumber');

Route::apiResource('tenderSessions', 'TenderSessionController');

Route::get('vehicleRegistrationNumbers/latest_number', 'VehicleRegistrationNumberController@getLatestNumberByArea');

Route::get('vehicleRegistrationNumbers/tender_number', 'VehicleRegistrationNumberController@getTenderNumbersByArea');

Route::post('tenders', 'TenderController@store');

Route::get('vehicle_licenses', 'VehicleLicenseController@index');
Route::get('vehicle_insurances', 'VehicleInsuranceController@index');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHome(){
		return view('home');
	}
	
	public function getNewVehicleRegistration(){
		return view('new_vehicle_registration');
	}
	
	public function getEditVehicleRegistrationInformation(){
		return view('edit_vehicle_registration_information');
	}
	
	public function getTransferVehicleOwnership(){
		return view('transfer_vehicle_ownership');
	}
	
	public function getVehicleLicense(){
		return view('vehicle_license');
	}
	
	public function getVehicleInsurance(){
		return view('vehicle_insurance');
	}

	public function getVehicleRegistrationNumber(){
		return view('vehicle_registration_number');
	}
}

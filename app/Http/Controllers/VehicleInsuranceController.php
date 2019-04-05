<?php

namespace App\Http\Controllers;

use App\VehicleInsurance;
use Illuminate\Http\Request;

class VehicleInsuranceController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_insurance = VehicleInsurance::where('vehicle_id', $request->vehicle_id)->orderBy('commencement_date', 'desc')->take(1)->get();

		return $vehicle_insurance;
    }
}

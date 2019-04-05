<?php

namespace App\Http\Controllers;

use App\VehicleLicense;
use Illuminate\Http\Request;

class VehicleLicenseController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_license = VehicleLicense::where('vehicle_id', $request->vehicle_id)->orderBy('commencement_date', 'desc')->take(1)->get();

		return $vehicle_license;
    }
}

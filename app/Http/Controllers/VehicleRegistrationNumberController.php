<?php

namespace App\Http\Controllers;

use App\VehicleRegistrationNumber;
use Illuminate\Http\Request;

class VehicleRegistrationNumberController extends Controller
{
    public function getLatestNumberByArea(Request $request)
    {
        $area_id = $request->area_id;

        $latest_number = VehicleRegistrationNumber::where('status', 'FREE')
            ->where('area_id', $area_id)->orderBy('id', 'asc')->take(1)->get();

        return $latest_number;
	}
}

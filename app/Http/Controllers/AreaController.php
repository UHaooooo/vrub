<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Resources\LatestNumberResource;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function latestNumber(Request $request)
    {
		$area_id = $request->input('area_id');
		
        return LatestNumberResource::collection(Area::with('latestVehicleRegistrationNumber')->where('id', $area_id)->take(1)->get());
    }
}

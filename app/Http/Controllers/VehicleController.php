<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleRegistrationNumber;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $vehicle_registration_number = VehicleRegistrationNumber::where('status', 'FREE')->where('id', $request->registration_number_id)->firstOrFail();

            $vehicle_registration_number->status = 'ASSIGNED';

            $vehicle_registration_number->saveOrFail();

            $vehicle = new Vehicle;
            $vehicle->registration_number_id = $request->registration_number_id;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->chassis_number = $request->chassis_number;
            $vehicle->production_year = $request->production_year;
            $vehicle->original_status = $request->original_status;
            $vehicle->engine_capacity = $request->engine_capacity;
            $vehicle->number_of_seat = $request->number_of_seat;
            $vehicle->color = $request->color;
            $vehicle->fuel_type = $request->fuel_type;
            $vehicle->purpose = $request->purpose;
            $vehicle->brand = $request->brand;
            $vehicle->model = $request->model;
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->laden_weight = $request->laden_weight;
            $vehicle->unladen_weight = $request->unladen_weight;
            $vehicle->kerb_weight = $request->kerb_weight;

            DB::transaction(function () use ($vehicle) {
                $vehicle->saveOrFail();
            });

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'ModelNotFoundException',
            ], 500);
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'QueryException',
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'Exception',
            ], 500);
        }

        return response()->json([
            'id' => $vehicle->id,
            'created_at' => $vehicle->created_at,
        ], 201);
    }

    public function destroy(Request $request, $id)
    {
        $vehicle_registration_number = VehicleRegistrationNumber::find($request->registration_number_id);

		$vehicle_registration_number->status = 'FREE';

		$vehicle_registration_number->save();

        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return response()->json(null, 204);
    }
}

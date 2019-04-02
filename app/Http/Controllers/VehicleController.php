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
    public function index(Request $request)
    {
        $vehicle_registration_number = $request->input('vehicle_registration_number');

        $vehicle = Vehicle::with('vehicleRegistrationNumber')
            ->whereHas('vehicleRegistrationNumber', function ($query) use ($vehicle_registration_number) {
                $query->where('registration_number', $vehicle_registration_number);
            })
            ->get();

        return $vehicle;
    }

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

    public function changeVehicleRegistrationNumber(Request $request, $id)
    {
        try {
            $new_vehicle_registration_number = VehicleRegistrationNumber::where('status', 'FREE')->where('id', $request->new_registration_number_id)->firstOrFail();

            $new_vehicle_registration_number->status = 'ASSIGNED';

            $new_vehicle_registration_number->saveOrFail();

            $vehicle = Vehicle::where('id', $id)->firstOrFail();

            $vehicle->registration_number_id = $request->new_registration_number_id;

            $vehicle->saveOrFail();

            $new_vehicle = new Vehicle;
            $new_vehicle->registration_number_id = $request->registration_number_id;
            $new_vehicle->engine_number = $request->engine_number;
            $new_vehicle->chassis_number = $request->chassis_number;
            $new_vehicle->production_year = $request->production_year;
            $new_vehicle->original_status = $request->original_status;
            $new_vehicle->engine_capacity = $request->engine_capacity;
            $new_vehicle->number_of_seat = $request->number_of_seat;
            $new_vehicle->color = $request->color;
            $new_vehicle->fuel_type = $request->fuel_type;
            $new_vehicle->purpose = $request->purpose;
            $new_vehicle->brand = $request->brand;
            $new_vehicle->model = $request->model;
            $new_vehicle->vehicle_type = $request->vehicle_type;
            $new_vehicle->laden_weight = $request->laden_weight;
            $new_vehicle->unladen_weight = $request->unladen_weight;
            $new_vehicle->kerb_weight = $request->kerb_weight;

            DB::transaction(function () use ($new_vehicle) {
                $new_vehicle->saveOrFail();
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
            'id' => $new_vehicle->id,
            'created_at' => $new_vehicle->created_at,
        ], 201);
    }

    public function revertChangeVehicleRegistrationNumber(Request $request, $id)
    {
        try {

            $new_vehicle_registration_number = VehicleRegistrationNumber::find($request->new_registration_number_id);

            $new_vehicle_registration_number->status = 'FREE';

            $new_vehicle_registration_number->save();

            $new_vehicle = Vehicle::find($request->id_to_delete);

            $new_vehicle->delete();

            $vehicle = Vehicle::where('id', $id)->firstOrFail();

            $vehicle->registration_number_id = $request->registration_number_id;

            $vehicle->saveOrFail();

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

        return response()->json(null, 201);
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

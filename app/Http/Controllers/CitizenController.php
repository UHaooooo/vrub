<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index(Request $request)
    {
        $identification_number = $request->input('identification_number');

        $citizens = Citizen::when($identification_number, function ($query) use ($identification_number) {
            return $query->where('identification_number', '=', "$identification_number");
        })->get();

        return $citizens;
    }

    public function store(Request $request)
    {
        $citizen = Citizen::create($request->all());

        return response()->json([
            'id' => $citizen->id,
            'created_at' => $citizen->created_at,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $citizen = Citizen::find($id);

        if (!$citizen) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found',
            ], 404);
        }

        $citizen->update($request->all());

        return response()->json(null, 204);
    }

    public function destroy(Request $request, $id)
    {
        $citizen = Citizen::find($id);

        if (!$citizen) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found',
            ], 404);
        }

        $citizen->delete();

        return response()->json(null, 204);
    }
}

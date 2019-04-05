<?php

namespace App\Http\Controllers;

use App\Tender;
use App\VehicleRegistrationNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function store(Request $request)
    {
        $registration_number = VehicleRegistrationNumber::where('registration_number', 'like',"%$request->registration_number%")
            ->first();

        $tender = new Tender;

        $tender->registration_number_id = $registration_number->id;
        $tender->tender_session_id = $request->tender_session_id;
        $tender->citizen_id = $request->citizen_id;
        $tender->tender_amount = $request->tender_amount;
        $tender->paid_amount = $request->paid_amount;
        $tender->status = 'WAIT_ASSIGN';
		$tender->tender_date = Carbon::now();
		
		$tender->save();

        return response()->json([
            'id' => $tender->id,
        ], 201);
    }
}

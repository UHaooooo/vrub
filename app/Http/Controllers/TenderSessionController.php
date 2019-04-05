<?php

namespace App\Http\Controllers;

use App\TenderSession;

class TenderSessionController extends Controller
{
    public function index()
    {
        $tender_sessions = TenderSession::whereDate('start_date', '<=', date("Y-m-d"))
            ->whereDate('end_date', '>=', date("Y-m-d"))
            ->get();

        return $tender_sessions;
    }
}

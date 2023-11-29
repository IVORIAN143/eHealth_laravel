<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\medicine;
use Illuminate\Http\Request;

class medicalMonitoringController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required'
        ]);

        $consultations = consultation::whereDate('created_at', $request->date)->with('student')->get();
        $meds = medicine::all();
        return  view('reporty.report_medical_monitoring', compact(['consultations', 'meds']));
    }
}

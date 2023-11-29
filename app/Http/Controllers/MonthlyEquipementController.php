<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use Illuminate\Http\Request;

class MonthlyEquipementController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required'
        ]);

        $equipments = equipment::whereMonth('created_at', $request->month)->whereYear('created_at', date('Y'))->with('used')->get();
        return  view('reporty.report_equipment_monthly_consumption', compact(['equipments']));
    }
}

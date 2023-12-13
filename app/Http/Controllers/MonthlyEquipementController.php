<?php

namespace App\Http\Controllers;

use App\Models\equipment;
use App\Models\user;
use Illuminate\Http\Request;

class MonthlyEquipementController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required'
        ]);

        $equipments = equipment::whereMonth('created_at', $request->month)->whereYear('created_at', date('Y'))->with('used')->get();
        $users = user::all();
        return  view('reporty.report_equipment_monthly_consumption', compact(['equipments', 'users']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\Models\user;
use Illuminate\Http\Request;

class MonthlyMedicineController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required'
        ]);

        $medicines = medicine::whereMonth('created_at', $request->month)->whereYear('created_at', date('Y'))->with('used')->get();
        $users = user::all();
        return  view('reporty.report_medicine_monthly_consumption', compact(['medicines', 'users']));
    }
}

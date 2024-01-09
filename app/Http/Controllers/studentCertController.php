<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\user;
use Illuminate\Http\Request;

class MonthlyMedicineController extends Controller
{
    public function index(Request $request)
    {

        $student = Student::find($request->id);
        $users = user::all();
        return  view('reporty.studentCert', compact(['students', 'users']));
    }
}

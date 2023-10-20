<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\equipment;
use App\Models\medicine;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax()){
        $student = student::where("semester", $request->semester)->where('schoolYear', $request->schoolyear)->count();
        $consultation = consultation::all()->count();
            return [
                "status"=>'success',
                'students'=>$student,
            ];


        }
        $equipment = equipment::all()->count();
        $medicine = medicine::all()->count();
        $users = User::all()->count();



        return view('index', compact('equipment','medicine','users'));
    }



}

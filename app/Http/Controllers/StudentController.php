<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Delete Student!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('students');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'student_id'=> 'required|max:8',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'course' => 'required',
            'year' => 'required',
            'gender' => "required",
            'birthday' => 'required',
            'contact' => 'required|integer',
        ]);

        $student = student::create([
            'student_id'=> $request->student_id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname'=>$request->lastname,
            'course'=>$request->course,
            'year'=>$request->year,
            'gender'=>$request->gender,
            'birthday'=>$request->birthday,
//            'contact'=>$request->contact,
        ]);

        if(is_null($student))
            Alert::error("Creation Error", "Can't Add Student");
        else
            Alert::success('Success', 'Successfuly Added!.');
            return redirect(route('students'));
    }

    public function delete(Request $request){
        $student = student::where('id', $request->id)->first();
        if(is_null($student))
        {
            Alert::error('Delete Error', "Can't Delete studend with id".$request->id);
        }
        $student->delete();
        Alert::success('Success', 'Successfuly Delete!.');
        return redirect(route('students'));

    }

    public function datatable()
    {
        return DataTables::of(student::all())->addColumn('Actions', 'component.studenttableaction')->rawColumns(['Actions'])->make(true);
    }
}

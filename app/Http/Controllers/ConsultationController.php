<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\equipment;
use App\Models\medicine;
use App\Models\MedUsed;
use App\Models\student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ConsultationController extends Controller
{
    public function index()
    {
        $students = student::all();
        $medicines = medicine::all();
        $title = 'Delete Consultation!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('consultation', compact(['students', 'medicines']));
    }

    public function store(Request $request){

        $validated = $request->validate([

            'student_id' => 'required',
            'diagnosis' => 'required',
            'medicine' => 'required',
            'instruction' => 'required',
        ]);

        $consultation = consultation::create([
            'student_id'=>$request->student_id,
            'diagnosis'=>$request->diagnosis,
            'instruction'=>$request->instruction,
            'status'=>0,
        ]);

        foreach ($request->medicine as $value){
            MedUsed::create([
                'fk_med_id'=> $value,
                'fk_consultation_id'=>$consultation->id,
            ]);
        }
        if(is_null($consultation))
            Alert::error("ERROR", 'Unsuccess please try again.');
        else
            Alert::success('Success', 'Successfuly Added!.');
        return redirect(route('consultation'));

    }

    public function editConsultation(Request $request){

        $validated = $request->validate([

            'student_id' => 'required',
            'diagnosis' => 'required',
            'medicine' => 'required',
            'instruction' => 'required',
        ]);


        $consultation = consultation::where('id', $request->id)->first();
        if(is_null($consultation))
            Alert::error("ERROR", 'Unsuccess please try again.');
        else {
            $consultation->update([
                'student_id' => $request->student_id,
                'diagnosis'=> $request->diagnosis,
                'instruction'=>$request->instruction,
            ]);
            foreach ($request->medicine as $value){
                foreach ($consultation->med_used as $med){
                    if($med->fk_med_id != $value){
                        $target = MedUsed::where('fk_med_id', $med->medicine->id)->where('fk_consultation_id', $request->id)->first();
                        if($target)
                            $target->delete();
                    }
                }

                $target = MedUsed::where('fk_med_id', $value)->where('fk_consultation_id', $request->id)->first();
                if(is_null($target)){
                    MedUsed::create([
                        'fk_med_id'=> $value,
                        'fk_consultation_id'=>$consultation->id,
                    ]);
                }

            }

            Alert::success('Success', 'Successfuly Edited!.');
            return redirect(route('consultation'));
        }
    }


    public function delete(Request $request){
        $consultation = consultation::where('id', $request->id)->first();
        if(is_null($consultation))
        {
            Alert::error('Delete Error', "Can't Delete the Consultation with id".$request->id);
        }
        $consultation->delete();
        Alert::success('Success', 'Successfuly Delete!.');
        return redirect(route('consultation'));

    }






    public function datatable()
    {
        return DataTables::of(consultation::all())->addColumn('student_name', function ($query){
            return $query->student->firstname.' '.$query->student->lastname;
        })->addColumn('prescrib_med',function ($query){
            $text = "";
            foreach ($query->med_used as $med_use){
                $text.= $med_use->medicine->med_name.", ";
            }
            return $text;
        })->addColumn('prescrib_meds', function ($query){
            $array = [];
            foreach ($query->med_used as $med_use){
                array_push($array, (int)$med_use->medicine->id);
            }
            return implode(",",$array);
        })->addColumn('Actions','component.consulttableaction')->rawColumns(['Actions'])->make(true);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\Equipment;
use App\Models\EquipUsed;
use App\Models\Medicine;
use App\Models\MedUsed;
use App\Models\student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        $students = Student::all();
        $medicines = Medicine::all();
        $equipments = Equipment::all();
        $title = 'Delete Consultation!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('consultation', compact('students', 'medicines', 'equipments', 'consultations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'complaints' => 'required',
            'diagnosis' => 'required',
            'medicine' => 'required',
            'instruction' => 'required',
            'remarks' => 'required',
            'semester' => 'required',
            'schoolYear' => 'required',
        ]);

        $consultation = Consultation::create([
            'student_id' => $request->student_id,
            'complaints' => $request->complaints,
            'diagnosis' => $request->diagnosis,
            'instruction' => $request->instruction,
            'remarks' => $request->remarks,
            'semester' => $request->semester,
            'schoolYear' => $request->schoolYear,
            'status' => 0,
        ]);

        foreach ($request->medicine as $value) {
            MedUsed::create([
                'fk_med_id' => $value,
                'fk_consultation_id' => $consultation->id,
                'quantity' => $request->quantity[$value]
            ]);
        }

        if (!is_null($request->equipment)) {
            foreach ($request->equipment as $value) {
                EquipUsed::create([
                    'fk_equip_id' => $value,
                    'fk_consultation_id' => $consultation->id,
                    'equip_quantity' => $request->equip_quantity[$value]
                ]);
            }
        }


        if (is_null($consultation)) {
            Alert::error("ERROR", 'Unsuccessful, please try again.');
        } else {
            Alert::success('Success', 'Successfully Added!');
        }

        return redirect(route('consultation'));
    }

    public function editConsultation(Request $request)
    {
        $validated = $request->validate([

            'student_id' => 'required',
            'complaints' => 'required',
            'diagnosis' => 'required',
            'medicine' => 'required',
            'instruction' => 'required',
            'remarks' => 'required',
            'quentity.*' => 'required',
        ]);

        $consultation = consultation::where('id', $request->id)->first();
        if (is_null($consultation))
            Alert::error("ERROR", 'Unsuccess please try again.');
        else {
            if ($consultation->status == 2) {
                $consultation->update([
                    'status' => 0
                ]);
            }
            $consultation->update([
                'student_id' => $request->student_id,
                'complaints' => $request->complaints,
                'diagnosis' => $request->diagnosis,
                'instruction' => $request->instruction,
                'remarks' => $request->remarks,
            ]);
            foreach ($request->medicine as $value) {
                foreach ($consultation->med_used as $med) {
                    if ($med->fk_med_id != $value) {
                        $target = MedUsed::where('fk_med_id', $med->medicine->id)->where('fk_consultation_id', $request->id)->first();
                        if ($target)
                            $target->delete();
                    }
                }

                $target = MedUsed::where('fk_med_id', $value)->where('fk_consultation_id', $request->id)->first();
                if (is_null($target)) {
                    MedUsed::create([
                        'fk_med_id' => $value,
                        'fk_consultation_id' => $consultation->id,
                    ]);
                }
            }
            foreach ($request->equipment as $value) {
                foreach ($consultation->equip_used as $equip) {
                    if ($equip->fk_equip_id != $value) {
                        $target = EquipUsed::where('fk_equip_id', $equip->equipment->id)->where('fk_consultation_id', $request->id)->first();
                        if ($target)
                            $target->delete();
                    }
                }

                $target = EquipUsed::where('fk_equip_id', $value)->where('fk_consultation_id', $request->id)->first();
                if (is_null($target)) {
                    EquipUsed::create([
                        'fk_equip_id' => $value,
                        'fk_consultation_id' => $consultation->id,
                    ]);
                }
            }

            Alert::success('Success', 'Successfuly Edited!.');
            return redirect(route('consultation'));
        }
    }











    public function delete(Request $request)
    {
        $consultation = consultation::where('id', $request->id)->first();
        if (is_null($consultation)) {
            Alert::error('Delete Error', "Can't Delete the Consultation with id" . $request->id);
        }
        $consultation->delete();
        Alert::success('Success', 'Successfuly Delete!.');
        return redirect(route('consultation'));
    }

    public function datatable(Request $request)
    {
        return DataTables::of(consultation::where('schoolYear', $request->schoolYear)->where('semester', $request->semester)->get())->addColumn('student_name', function ($query) {
            return $query->student->firstname . ' ' . $query->student->lastname;
        })->addColumn('prescrib_med', function ($query) {
            $text = "";
            foreach ($query->med_used as $med_use) {
                $text .= $med_use->medicine->med_name . ", ";
            }
            return $text;
        })->addColumn('prescrib_equip', function ($query) {
            $text = "";
            foreach ($query->equip_used as $equip_use) {
                $text .= $equip_use->equipment->equipname . ", ";
            }
            return $text;
        })->addColumn('status_string', function ($query) {
            if ($query->status == 1) {
                return 'Approved';
            } elseif ($query->status == 2) {
                return 'Disapproved';
            } else {
                return 'Pending';
            }
        })->addColumn('prescrib_med_quantity', function ($query) {
            $text = "";
            foreach ($query->med_used as $med_use) {
                $text .= $med_use->quantity . ", ";
            }
            return $text;
        })->addColumn('prescrib_equip_quantity', function ($query) {
            $text = "";
            foreach ($query->equip_used as $equip_use) {
                $text .= $equip_use->equip_quantity . ", ";
            }
            return $text;
        })->addColumn('prescrib_meds', function ($query) {
            $array = [];
            foreach ($query->med_used as $med_use) {
                array_push($array, (int)$med_use->medicine->id);
            }
            return implode(",", $array);
        })->addColumn('prescrib_equips', function ($query) {
            $array = [];
            foreach ($query->equip_used as $equip_use) {
                array_push($array, (int)$equip_use->equipment->id);
            }
            return implode(",", $array);
        })->addColumn('Actions', 'component.consulttableaction')->rawColumns(['Actions'])->make(true);
    }


    public function statusApprove(Request $request)
    {
        $consultation = consultation::where('id', $request->id)->first();
        if (is_null($consultation)) {
            Alert::error('Error', 'Please try again' . $request->id);
        }
        $consultation->update(['status' => 1]);
        return redirect(route('consultation'));
    }

    public function statusDisapprove(Request $request)
    {
        $consultation = consultation::where('id', $request->id)->first();
        if (is_null($consultation)) {
            Alert::error('Error', 'Please try again' . $request->id);
        }
        $consultation->update(['status' => 2]);
        return redirect(route('consultation'));
    }
}

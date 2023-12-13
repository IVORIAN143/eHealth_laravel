<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use App\Models\consultation;




class StudentController extends Controller
{
    public function index()
    {
        $title = 'Delete Student!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('students');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'fad_allergy' => 'required',

            'student_id' => 'required',
            'contact' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'gender' => 'required',
            'civilStat' => 'required',
            'dateOfBirth' => 'required',
            'course' => 'required',
            'year' => 'required',

            'homeAddress' => 'required',
            'parentAddress' => 'required',
            'parentName' => 'required',
            'relationship' => 'required',
            'parentNumber' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'recieveVaccine' => 'required',
            'infectedCovid' => 'required',

            'semester' => 'required',
            'schoolYear' => 'required',

        ]);

        $student = student::create([
            'fad_Allergy' => $request->fed_Allergy,
            'fad_indicate' => $request->fed_indicate,

            'student_id' => $request->student_id,
            'contact' => $request->contact,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'gender' => $request->gender,
            'civilStat' => $request->civilStat,
            'dateOfBirth' => $request->dateOfBirth,
            'course' => $request->course,
            'year' => $request->year,
            'homeAddress' => $request->homeAddress,

            'parentName' => $request->parentName,
            'parentAddress' => $request->parentAddress,
            'relationship' => $request->relationship,
            'parentNumber' => $request->parentNumber,
            'height' => $request->height,
            'weight' => $request->weight,

            'infectedCovid' => $request->infectedCovid,
            'inferctedWhere' => $request->infectedWhere,
            'recieveVaccine' => $request->recieveVaccine,

            'dateDose1' => $request->dataDose1,
            'dateDose2' => $request->dataDose2,
            'dateBoostDose1' => $request->dataBoostDose1,
            'dateBoostDose2' => $request->dataBoostDose2,

            'vaccineBrand' => $request->vaccineBrand,

            'dose1' => $request->dose1,
            'dose2' => $request->dose2,
            'Booster1' => $request->booster1,
            'Booster2' => $request->booster2,

            'location1' => $request->location1,
            'location2' => $request->location2,
            'boostLocation1' => $request->boosterLocation1,
            'boostLocation2' => $request->boosterLocation2,

            'semester' => $request->semester,
            'schoolYear' => $request->schoolYear,


        ]);

        if (is_null($student))
            Alert::error("Creation Error", "Can't Add Student");
        else
            Alert::success('Success', 'Successfuly Added!.');
        return redirect(route('students'));
    }


    // NOT FUNCTIONING NEXT THIS IS NEXT LIFE LMAO
    public function editstudent(Request $request, $id)
    {
        $target = student::where('id', $id);

        if (is_null($target)) {
            Alert::error("Edit Error", "Can't find the Student");
        } else {
            $target->update([
                'fad_Allergy' => $request->fed_Allergy,
                'fad_indicate' => $request->fed_indicate,

                'student_id' => $request->student_id,
                'contact' => $request->contact,
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'gender' => $request->gender,
                'civilStat' => $request->civilStat,
                'dateOfBirth' => $request->dateOfBirth,
                'course' => $request->course,
                'year' => $request->year,
                'homeAddress' => $request->homeAddress,

                'parentName' => $request->parentName,
                'parentAddress' => $request->parentAddress,
                'relationship' => $request->relationship,
                'parentNumber' => $request->parentNumber,
                'height' => $request->height,
                'weight' => $request->weight,

                'infectedCovid' => $request->infectedCovid,
                'inferctedWhere' => $request->infectedWhere,
                'recieveVaccine' => $request->recieveVaccine,

                'dateDose1' => $request->dataDose1,
                'dateDose2' => $request->dataDose2,
                'dateBoostDose1' => $request->dataBoostDose1,
                'dateBoostDose2' => $request->dataBoostDose2,

                'vaccineBrand' => $request->vaccineBrand,

                'dose1' => $request->dose1,
                'dose2' => $request->dose2,
                'Booster1' => $request->booster1,
                'Booster2' => $request->booster2,

                'location1' => $request->location1,
                'location2' => $request->location2,
                'boostLocation1' => $request->boosterLocation1,
                'boostLocation2' => $request->boosterLocation2,
            ]);
            Alert::success('Success', 'Successfully updated!.');
            return redirect(route('students'));
        }
    }

    public function delete(Request $request)
    {
        $student = student::where('id', $request->id)->first();
        if (is_null($student)) {
            Alert::error('Delete Error', "Can't Delete student with id" . $request->id);
        }
        $student->delete();
        Alert::success('Success', 'Successfuly Delete!.');
        return redirect(route('students'));
    }

    public function datatable(Request $request)
    {
        return DataTables::of(student::where('schoolYear', $request->schoolYear)->where('semester', $request->semester)->get())->addColumn('Actions', 'component.studenttableaction')->rawColumns(['Actions'])->make(true);
    }

    public function updateConsultationRemarks(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer',
            'remark' => 'required|string',
        ]);

        // Update the consultation remarks in the database
        $consultation = Consultation::find($request->id);
        if (!$consultation) {
            return response()->json(['error' => 'Consultation not found'], 404);
        }

        $consultation->remarks = $request->remark;
        $consultation->save();

        // Return a success response
        return response()->json(['message' => 'Consultation remarks updated successfully']);
    }
}

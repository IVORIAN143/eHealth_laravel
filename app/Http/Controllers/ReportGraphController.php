<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\equipment;
use App\Models\eedicine;
use App\Models\student;
use App\Models\user;
use Illuminate\Http\Request;

class ReportGraphController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Your AJAX logic goes here
            $semester = $request->semester;
            $schoolYear = $request->schoolYear;
            $studentCount = Student::count();
            $bsitCount = Student::where('semester', $request->semester)->where('schoolYear', $request->schoolyear)->where('course', 'BSIT')->count();
            $bsaCount = Student::where('semester', $request->semester)->where('schoolYear', $request->schoolyear)->where('course', 'BSA')->count();
            $semesterStudentCount = Student::where("semester", $request->semester)->where('schoolYear', $request->schoolyear)->count();
            $nurseCount = User::where('role', 'nurse')->count();
            $doctorCount = User::where('role', 'doctor')->count();

            return [
                "status" => 'success',
                'studentCount' => $studentCount,
                'bsit' => $bsitCount,
                'bsa' => $bsaCount,
                'students' => $semesterStudentCount,
                'nurseCount' => $nurseCount,
                'doctorCount' => $doctorCount,
            ];
        }

        // The rest of your code remains unchanged
        $equipment = Equipment::count();
        $medicine = Medicine::count();
        $users = User::count();
        $pendingCount = Consultation::where('status', 0)->count();
        $approvedCount = Consultation::where('status', 1)->count();
        $declinedCount = Consultation::where('status', 2)->count();
        $nurseCount = User::where('role', 'nurse')->count();
        $doctorCount = User::where('role', 'doctor')->count();

        return view('reporty.report_graph', compact('nurseCount', 'doctorCount', 'equipment', 'medicine', 'users', 'pendingCount', 'approvedCount', 'declinedCount'));
    }
}

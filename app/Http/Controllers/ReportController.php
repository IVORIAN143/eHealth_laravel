<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables; // Adjusted import
use App\Models\MedicineUsed;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Delete?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('report');
    }

    public function datatable()
    {
        $data = DB::table('med_used')
            ->join('medicine', 'med_used.medicine_id', '=', 'medicine.id')
            ->select('med_used.*', 'medicine.med_name as med_name')
            ->get();

        return DataTables::of($data)->make(true);
    }
}

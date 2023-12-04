<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('file')) {
                try {
                    $file = $request->file('file');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads', $fileName, 'public');

                    // Import data from the uploaded CSV file
                    Excel::import(new StudentsImport, storage_path('app/public/uploads/' . $fileName));

                    Alert::success('Success', 'Data imported successfully.')->persistent(true);

                    return redirect()->route('students');
                } catch (\Exception $e) {
                    Alert::error('Error', 'Import failed: ' . $e->getMessage())->persistent(true);
                    return back();
                }
            } else {
                Alert::error('Error', 'No file uploaded.')->persistent(true);
                return back();
            }
        } else {
            return "Unsupported method. Please use POST method.";
        }
    }
}

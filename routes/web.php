<?php

use App\Http\Controllers\auth\LoginControler;
use App\Http\Controllers\HomeController;
use App\Models\consultation;
use App\Models\equipment;
use App\Models\medicine;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\medDailyContoller;
use App\Http\Controllers\medicalMonitoringController;
use App\Http\Controllers\MonthlyConsumptionController;
use App\Http\Controllers\MonthlyEquipementController;
use App\Http\Controllers\MonthlyMedicineController;
use App\Http\Controllers\SignatureController;
use App\Models\MedUsed;
use App\Models\User;
use Laravel\Fortify\Fortify;
use PragmaRX\Google2FA\Google2FA;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'otp'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/import', [CsvImportController::class, 'import'])->name('import');


    Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students');
    Route::get('/inventory', [\App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
    Route::get('/consultation', [\App\Http\Controllers\ConsultationController::class, 'index'])->name('consultation');
    Route::get('/report', [\App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');



    Route::post('/students', [\App\Http\Controllers\StudentController::class, 'store'])->name('storestudent');
    // Route::delete('/students/delete', [\App\Http\Controllers\StudentController::class, 'delete'])->name('deletestudent');
    Route::get('/students/api/datatable', [\App\Http\Controllers\StudentController::class, 'datatable'])->name('datatablestudent');
    Route::post('/student/update/{id}', [\App\Http\Controllers\StudentController::class, 'editstudent'])->name('editstudent');

    Route::post('/inventory', [\App\Http\Controllers\InventoryController::class, 'store'])->name('storemedicine');
    Route::delete('/medicine/delete/{id}', [\App\Http\Controllers\InventoryController::class, 'delete'])->name('deletemedicine');
    Route::get('/medicine/api/datatable', [\App\Http\Controllers\InventoryController::class, 'datatable'])->name('datatablemedicine');
    Route::post('medicine/edit', [\App\Http\Controllers\InventoryController::class, 'edit'])->name('editmedicine');


    Route::get('/equip/api/datatable', [\App\Http\Controllers\InventoryController::class, 'datatableequip'])->name('datatableequip');
    Route::delete('/equip/delete', [\App\Http\Controllers\InventoryController::class, 'deleteequip'])->name('deleteequip');
    Route::post('/equip', [\App\Http\Controllers\InventoryController::class, 'storeequipment'])->name('storeequipment');
    Route::post('/equip/edit', [\App\Http\Controllers\InventoryController::class, 'editequip'])->name('editequipments');


    Route::get('/consultation/api/datatable', [\App\Http\Controllers\ConsultationController::class, 'datatable'])->name('datatableconsultation');
    Route::post('/consultation', [\App\Http\Controllers\ConsultationController::class, 'store'])->name('storeConsult');
    Route::delete('/consultation/delete', [\App\Http\Controllers\ConsultationController::class, 'delete'])->name('deleteConsultation');
    Route::post('/consultation/edit', [\App\Http\Controllers\ConsultationController::class, 'editConsultation'])->name('editConsultation');
    Route::post('/upload/signature', [\App\Http\Controllers\ConsultationController::class, 'upload'])->name('uploadSignature');

    Route::post('/save-signature', [SignatureController::class, 'saveSignature'])->name('saveSignature');


    Route::get('/user/api/datatableUser', [\App\Http\Controllers\UserController::class, 'datatable'])->name('datatableUser');
    Route::post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
    Route::delete('/user/delete', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/user/edit', [\App\Http\Controllers\UserController::class, 'editUser'])->name('editUser');


    Route::get('/consultation/statusApprove', [\App\Http\Controllers\ConsultationController::class, 'statusApprove'])->name('statusApprove');
    Route::get('/consultation/statusDisapprove', [\App\Http\Controllers\ConsultationController::class, 'statusDisapprove'])->name('statusDisapprove');

    Route::post('/equip/addSupply', [\App\Http\Controllers\InventoryController::class, 'addSupplyEquip'])->name('addsupplyEquipment');
    Route::post('/med/addSupply', [\App\Http\Controllers\InventoryController::class, 'addSupplyMed'])->name('addsupplyMedicine');

    Route::post('/save-signature', [SignatureController::class, 'saveSignature'])->name('signature.save');



    // report
    Route::get('/medicineDaily', [medDailyContoller::class, 'index'])->name('medDaily');

    Route::get('/equipMonthly', [MonthlyEquipementController::class, 'index'])->name('equipMonthly');
    Route::get('/medMonthly', [MonthlyMedicineController::class, 'index'])->name('medMonthly');
    Route::get('/medmonitor', [medicalMonitoringController::class, 'index'])->name('medMonitor');





    //diagram
    Route::get('/monthlyConsumption', [MonthlyConsumptionController::class, 'getMedicineUsedData'])->name('monthlyConsumption');

    Route::get('/getMedUsed/{id}', function ($id) {
        $medused = MedUsed::find($id);

        return response()->json([
            'data' => $medused
        ]);
    });
});

Route::post('/login', [LoginControler::class, 'login'])->name('loginuser');
Route::get('/validate-otp', [LoginControler::class, 'otpView'])->middleware('auth')->name('otpView');
Route::post('/validate-otp', [LoginControler::class, 'checkOTP'])->name('validate-otp');


Route::get('/dailyMedTable', function () {
    $medicines = medicine::all();
    return view('report_tbl.dailyMedTable', compact(['medicines']));
})->name('dailyMedTable');


// for Student View
Route::get('/studentView', function (Request $request) {
    $consultations = consultation::find($request->id);
    $medicines = medicine::find($request->id);
    $student = Student::find($request->id);
    return view('student_view.studentView', compact(['student', 'medicines', 'consultations']));
})->name('studentView');


// for student edit
Route::get('/studentUpdate', function (Request $request) {
    $student = Student::find($request->id);
    return view('student_view.updateStudent', compact('student'));
})->name('studentUpdate');



// print
Route::get('/studentCert', function (Request $request) {
    $student = Student::find($request->id);
    return view('reporty.report_certificate', compact('student'));
})->name('studentCert');

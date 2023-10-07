<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students');
    Route::get('/inventory', [\App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
    Route::get('/consultation',[\App\Http\Controllers\ConsultationController::class, 'index'])->name('consultation');
    Route::get('/report',[\App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user');


    Route::post('/students', [\App\Http\Controllers\StudentController::class, 'store'])->name('storestudent');
    Route::delete('/students/delete', [\App\Http\Controllers\StudentController::class, 'delete'])->name('deletestudent');
    Route::get('/students/api/datatable', [\App\Http\Controllers\StudentController::class, 'datatable'])->name('datatablestudent');

    Route::post('/inventory',[\App\Http\Controllers\InventoryController::class, 'store'])->name('storemedicine');
    Route::delete('/medicine/delete',[\App\Http\Controllers\InventoryController::class, 'delete'])->name('deletemedicine');
    Route::get('/medicine/api/datatable', [\App\Http\Controllers\InventoryController::class, 'datatable'])->name('datatablemedicine');
    Route::post('medicine/edit',[\App\Http\Controllers\InventoryController::class, 'edit'])->name('editmedicine');


    Route::get('/equip/api/datatable',[\App\Http\Controllers\InventoryController::class, 'datatableequip'])->name('datatableequip');
    Route::delete('/equip.delete', [\App\Http\Controllers\InventoryController::class , 'deleteequip'])->name('deleteequip');
    Route::post('/equip', [\App\Http\Controllers\InventoryController::class, 'storeequipment'])->name('storeequipment');
    Route::post('/equip/edit',[\App\Http\Controllers\InventoryController::class, 'editequip'])->name('editequipments');

    Route::get('/consultation/api/datatable',[\App\Http\Controllers\ConsultationController::class, 'datatable'])->name('datatableconsultation');
    Route::post('/consultation', [\App\Http\Controllers\ConsultationController::class, 'store'])->name('storeConsult');
    Route::delete('/consultation/delete', [\App\Http\Controllers\ConsultationController::class, 'delete'])->name('deleteConsultation');
    Route::post('/consultation/edit',[\App\Http\Controllers\ConsultationController::class, 'editConsultation'])->name('editConsultation');
});




Route::get('/test', [TestController::class, "index"]);


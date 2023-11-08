<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\equipment;
use App\Models\medicine;
use App\Models\PurchasedDuringEquip;
use App\Models\PurchasedDuringMed;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class InventoryController extends Controller
{
    //    forn medicine

    public function index()
    {
        $title = 'Delete?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);
        return view('inventory');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([

            'med_name' => 'required|unique:medicine',
            'description' => 'required',
            'expiration' => 'required',
            'quantity' => 'required',
        ]);

        $medicne = medicine::create([
            'med_name' => $request->med_name,
            'description' => $request->description,
            'expiration' => $request->expiration,
            'quantity' => $request->quantity,

        ]);

        if (is_null($medicne))
            Alert::error("Creation Error", "Can't Add Medicine");
        else
            Alert::success('Success', 'Successfuly Added!.');
        return redirect(route('inventory'));
    }
    public function edit(Request $request)
    {
        $target = medicine::where('id', $request->id);
        if (is_null($target))
            Alert::error("Edit Error", "Can't find Medicine");
        else {
            $target->update([
                'med_name' => $request->med_name,
                'description' => $request->description,
                'expiration' => $request->expiration,
                'quantity' => $request->quantity,
            ]);
            Alert::success('Success', 'Successfuly edited!.');
            return redirect(route('inventory'));
        }
    }

    public function delete(Request $request)
    {
        $medicine = medicine::where('id', $request->id)->first();
        if (is_null($medicine)) {
            Alert::error('Delete Error', "Can't Delete studend with id" . $request->id);;
        }
        $medicine->delete();
        Alert::success('Success', 'Successfuly Deleted!.');
        return redirect(route('inventory'));
    }

    public function datatable()
    {
        return DataTables::of(medicine::all())
            ->addColumn('totalquantity', function ($quantity) {
                return $quantity->totalMed();
            })
            ->addColumn('Actions', 'component.medicinetableaction')->rawColumns(['Actions'])->make(true);
    }

    public function addSupplyMed(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required', // Assuming 'id' is the medicine ID in the form
            'med_quantity' => 'required',
        ]);

        $targetMed = medicine::find($request->id); // Use 'find' to fetch a specific medicine record by its ID

        if (is_null($targetMed)) {
            Alert::error("Edit Error", "Can't find Medicine");
            return redirect(route('inventory'));
        } else {
            $supply = PurchasedDuringMed::create([
                'fk_medicine_id' => $request->id,
                'medicine_quantity' => $request->med_quantity, // Corrected the field name
            ]);

            Alert::success('Success', 'Successfully Supplied!');
            return redirect(route('inventory'));
        }
    }


    // public function deletemed(Request $request)
    // {
    //     $med = medicine::where('id', $request->id)->first();
    //     if (is_null($med)) {
    //         Alert::error('Delete Error', "Can't Delete equipment with id" . $request->id);;
    //     }
    //     $med->delete();
    //     Alert::success('Success', 'Successfuly Deleted!.');
    //     return redirect(route('inventory'));
    // }
    // public function datatablemed()
    // {
    //     return DataTables::of(medicine::all())->addColumn('Actions', 'component.medicinetableaction')->rawColumns(['Actions'])->make(true);
    // }





    //    for equipments
    public function storeequipment(Request $request)
    {

        $validated = $request->validate([

            'equipname' => 'required|unique:equipment',
            'descriptio' => 'required',
            'equi_expiration' => 'required',
            'equip_quantity' => 'required',
        ]);

        $equip = equipment::create([
            'equipname' => $request->equipname,
            'descriptio' => $request->descriptio,
            'equi_expiration' => $request->equi_expiration,
            'equip_quantity' => $request->equip_quantity,

        ]);

        if (is_null($equip))
            Alert::error("Creation Error", "Can't Add Medicine");
        else
            Alert::success('Success', 'Successfuly Added!.');
        return redirect(route('inventory'));
    }
    public function editequip(Request $request)
    {
        $target = equipment::where('id', $request->id);
        // dd($target);
        if (is_null($target))
            Alert::error("Edit Error", "Can't find Equipments");
        else {
            $target->update([
                'equipname' => $request->equipname,
                'descriptio' => $request->descriptio,
                'equip_quantity' => $request->equip_quantity,
                'equi_expiration' => $request->equi_expiration,
            ]);
            Alert::success('Success', 'Successfuly edited!.');
            return redirect(route('inventory'));
        }
    }

    public function deleteequip(Request $request)
    {
        $equip = equipment::where('id', $request->id)->first();
        if (is_null($equip)) {
            Alert::error('Delete Error', "Can't Delete equipment with id" . $request->id);;
        }
        $equip->delete();
        Alert::success('Success', 'Successfuly Deleted!.');
        return redirect(route('inventory'));
    }

    public function datatableequip()
    {
        return DataTables::of(equipment::all())
            ->addColumn('equip_total_quantity', function ($quantity) {
                return $quantity->TotalSupply();
            })
            ->addColumn('Actions', 'component.equiptableaction')->rawColumns(['Actions'])->make(true);
    }

    // -----------
    public function addSupplyEquip(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'equip_quantity' => 'required',
        ]);

        $targetEquipe = equipment::where($request->id);

        if (is_null($targetEquipe)) {
            Alert::error("Edit Error", "Can't find Equipment");
            return redirect(route('inventory'));
        } else {
            $supply = PurchasedDuringEquip::create([
                'fk_equip_id' => $request->id,
                'equip_quantity' => $request->equip_quantity,
            ]);

            Alert::success('Success', 'Successfuly Supplied!.');
            return redirect(route('inventory'));
        }
    }
}












/////////////////////////////////////
// In the controller method where you fetch data for DataTable
$medicines = Medicine::all();

foreach ($medicines as $medicine) {
    // Perform calculation for 'totalquantity'
    $medicine->totalquantity = $medicine->quantity * $medicine->dosage; // Adjust this calculation based on your specific logic
}

return response()->json([
    'data' => $medicines
]);

<?php

namespace App\Http\Controllers;

use App\Models\EquipUsed;
use App\Models\MedUsed;
use DateTime;
use Illuminate\Http\Request;

class MonthlyConsumptionController extends Controller
{

    public function getMedicineUsedData(Request $request)
    {
        $yearSchool = $request->schoolYear; // Change to yearSchool

        $medicineUsedData = MedUsed::selectRaw('MONTH(created_at) as month, SUM(quantity) as total_quantity')
            ->whereYear('created_at', $yearSchool) // Change to yearSchool
            ->groupBy('month')
            ->pluck('total_quantity', 'month')
            ->map(function ($value, $key) {
                return [
                    DateTime::createFromFormat('!m', $key)->format('M') => $value,
                ];
            })->values()
            ->first();

        $equipUsedData = EquipUsed::selectRaw('MONTH(created_at) as month, SUM(equip_quantity) as total_equip_quantity')
            ->whereYear('created_at', $yearSchool) // Change to yearSchool
            ->groupBy('month')
            ->pluck('total_equip_quantity', 'month')
            ->mapWithKeys(function ($value, $key) {
                return [DateTime::createFromFormat('!m', $key)->format('M') => $value];
            })
            ->values()
            ->first();

        return response()->json([
            'medicine' => $medicineUsedData,
            'equipment' => $equipUsedData,
        ]);
    }
}

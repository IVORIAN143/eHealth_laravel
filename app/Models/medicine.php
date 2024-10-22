<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    use HasFactory;

    protected $table = 'medicine';

    protected $fillable = [
        'med_name',
        'description',
        'expiration',
        'quantity',
    ];

    public function used()
    {
        return $this->hasMany(MedUsed::class, 'fk_med_id', 'id');
    }

    public function countUsed()
    {
        return $this->used->sum('quantity');
    }
    public function addMed()
    {
        return  $this->hasMany(PurchasedDuringMed::class, 'fk_medicine_id', 'id');
    }
    public function SumMed()
    {
        $Medicines = $this->addMed->filter(function ($item) {
            return $item->created_at->year == date('Y') && $item->created_at->month == date('m');
        });

        return $Medicines->sum('medicine_quantity');
    }
    public function totalMed()
    {
        try {
            $medicines = $this->addMed;

            $test = $this->quantity + $this->SumMed() - $this->countUsed();

            return $test;
        } catch (\Exception $e) {
            return 0;
        }
    }
}

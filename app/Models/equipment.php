<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    use HasFactory;
    protected $table = 'equipment';

    protected $fillable = [
        'equipname',
        'descriptio',
        'equi_expiration',
        'equip_quantity',
    ];

    public function used()
    {
        return $this->hasMany(EquipUsed::class, 'fk_equip_id', 'id');
    }

    public function countUsed()
    {
        return $this->used->sum('equip_quantity');
    }
    public function addSupply()
    {
        return  $this->hasMany(PurchasedDuringEquip::class, 'fk_equip_id', 'id');
    }
    public function SumSupply()
    {
        $supplies = $this->addSupply->filter(function ($item) {
            return $item->created_at->year == date('Y') && $item->created_at->month == date('m');
        });

        return $supplies->sum('equip_quantity');
    }
    public function TotalSupply()
    {
        $supplies = $this->addSupply();

        return $supplies->sum('equip_quantity');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedDuringEquip extends Model
{
    use HasFactory;

    protected $table = 'purchased_during_equip';


    public $fillable = [
        'fk_equip_id',
        'equip_quantity'
    ];
}

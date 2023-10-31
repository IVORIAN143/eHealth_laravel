<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedDuringMed extends Model
{
    use HasFactory;

    protected $table = 'purchased_during_med';


    public $fillable = [
        'fk_medicine_id',
        'medicine_quantity'
    ];
}

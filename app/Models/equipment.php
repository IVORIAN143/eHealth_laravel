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
        'equip_quantity',
    ];
}

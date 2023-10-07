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
}

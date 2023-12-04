<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class consultation extends Model
{
    use HasFactory;
    protected $table = 'consultation';

    protected $fillable = [
        'student_id',
        'fk_med_used_id',
        'fk_equip_used_id',
        'complaints',
        'diagnosis',
        'instruction',
        'remarks',
        // 'signature',
        'quantity',
        'status',
        'schoolYear',
        'semester',
    ];

    public function countUsed()
    {
        return $this->med_used->sum('quantity');
    }

    public function date()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    public function student()
    {
        return $this->hasOne(student::class, 'id', 'student_id');
    }

    public  function med_used()
    {
        return $this->hasMany(MedUsed::class, 'fk_consultation_id', 'id');
    }

    public function equip_used()
    {
        return $this->hasMany(EquipUsed::class, 'fk_consultation_id', 'id');
    }
}

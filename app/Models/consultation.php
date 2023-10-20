<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    use HasFactory;
    protected $table = 'consultation';

    protected $fillable = [
        'student_id',
        'fk_med_used_id',
        'fk_equip_used_id',
        'diagnosis',
        'instruction',
        'quantity',
        'status',
        'schoolYear',
        'semester',
    ];

    public function student()
    {
        return $this->hasOne( student::class,'id', 'student_id');
    }
    public  function med_used(){
        return $this->hasMany( MedUsed::class,'fk_consultation_id', 'id');
    }
    public function equip_used(){
        return $this->hasMany( EquipUsed::class, 'fk_consultation_id', 'id');
    }


}

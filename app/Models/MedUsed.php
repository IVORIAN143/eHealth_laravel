<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedUsed extends Model
{
    use HasFactory;

    protected $table = "medicine_used";

    protected $fillable =[
      'fk_med_id',
        'fk_consultation_id',
        'quantity',
    ];

    public function medicine(){
        return $this->hasOne(medicine::class, 'id', 'fk_med_id');
    }
    public function deductQuantity(){
        $meduse = $this->medicine;
        $meduse->update([
            'quantity' =>  $meduse->quantity - $this->quantity,
        ]);

    }

}

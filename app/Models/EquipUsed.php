<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipUsed extends Model
{
    use HasFactory;

    protected  $table = "equipment_used";

    protected $fillable = [
        'fk_equip_id',
        'fk_consultation_id',
        'equip_quantity',
    ];

    public function equipment()
    {
        return $this->hasOne(equipment::class, 'id', 'fk_equip_id');
    }

    public function deductQuantity()
    {
        $equipuse = $this->equipment;
        $equipuse->update([
            'equip_quantity' => $equipuse->equip_quantity - $this->equip_quantity,
        ]);
    }
}

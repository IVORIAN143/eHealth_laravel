<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'fad_Allergy',
        'fad_indicate',

        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'course',
        'year',
        'gender',
        'contact',
        'citizenship',
        'civilStat',
        'dateOfBirth',
        'placeOfBirth',
        'course',
        'year',
        'homeAddress',

        'parentName',
        'parentAddress',
        'relationship',
        'parentNumber',
        'height',
        'weight',


        'infectedCovid',
        'infectedWhere',

        'recieveVaccine',
        'dataDose1',
        'dataDose2',
        'dataBoostDose1',
        'dataBoostDose2',
        'vaccineBrand',
        'dose1',
        'dose2',
        'boosterLocation1',
        'boosterLocation2',
        'semester',
        'schoolYear',
        'contact',



    ];

    public function consultation()
    {
        return $this->hasMany(Consultation::class);
    }

    protected $casts = [
        'dateOfBirth' => 'datetime',
    ];
}

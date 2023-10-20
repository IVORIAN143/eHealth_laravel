<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'course',
        'year',
        'gender',
        'dateOfBirth',
        'homeAddress',
        'parentName',
        'parentAddress',
        'relationship',
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
        'fad_Allergy',
        'fad_indicate',


    ];


}

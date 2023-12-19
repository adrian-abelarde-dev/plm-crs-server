<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Users extends Model
{
    protected $fillable = [
        'id',
        'firstName',
        'middleName',
        'lastName',
        'nameExtension',
        'gender',
        'maidenName',
        'plmEmail',
        'birthday',
        'birthplace',
        'civilStatus',
        'country',
        'mobilePhone',
        'streetAddress',
        'zipCode',
        'provinceCity',
        'unit',
        'status',
        'expiryDate'
    ];

    public function hasAdminRole(){
        return $this->hasOne(Admin::class, 'userId');
    }

    public function hasStudentRole(){
        return $this->hasOne(Student::class, 'userId');
    }

    public function hasStudentGradRole(){
        return $this->hasOne(StudentGrad::class, 'userId');
    }

    public function hasChairpersonUndergradRole(){
        return $this->hasOne(ChairpersonUndergrad::class, 'userId');
    }

    public function hasChairpersonGradRole(){
        return $this->hasOne(ChairpersonGrad::class, 'userId');
    }

    public function hasFacultyRole(){
        return $this->hasOne(Faculty::class, 'userId');
    }



}

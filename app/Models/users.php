<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class users extends Model
{
    protected $fillable = [
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


}

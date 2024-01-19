<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'userId',
        'tinNumber',
        'gsisNumber',
        'pedigree',
        'instructorCode',
        'onGraduate',
    ];
}

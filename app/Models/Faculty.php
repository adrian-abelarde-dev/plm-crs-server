<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
     protected $fillable = [
        'id',
        'userId',
        'tinNumber',
        'gsisNumber',
        'pedigree',
        'instructorCode'
    ];
}

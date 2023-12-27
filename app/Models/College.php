<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $primaryKey = 'collegeId';
    protected $fillable = [
        'collegeId', 
        'collegeName',
        'type',
        'status'
    ];
}

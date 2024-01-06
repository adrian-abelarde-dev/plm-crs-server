<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseCode',
        'section',
        'courseTitle',
        'units',
        'classSchedule',
        'studentCount',
        'creditedUnits',
        'college',
        'loadType',
        'aysem',
        'facultyId',
    ];
}

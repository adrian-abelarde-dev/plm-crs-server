<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    use HasFactory;

    protected $table = 'courseSchedules';

    protected $fillable = [
        'courseID',
        'blockID',
        'isInstructorsConcealed',
        'isNoDefiniteTimeDay',
        'isClassHoursToBeAnnounced',
        'updatedBy',
        'status'
    ];
}

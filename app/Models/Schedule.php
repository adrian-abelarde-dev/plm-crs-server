<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'subjectID',
        'sectionID',
        'collegeID',
        'credits',
        'allotedSlots',
        'parentClassCode',
        'minYearLevel',
        'aysem',
        'isInstructorsConcealed',
        'isNoDefiniteTimeDay',
        'isClassHoursToBeAnnounced',
        'updatedBy'
    ];
}

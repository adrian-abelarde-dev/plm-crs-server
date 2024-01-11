<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GradCurriculums;

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

    public function curriculums_class_relationship()
    {
        return $this->belongsToMany(GradClasses::class, 'grad_class_and_curriculum', 'curriculumId', 'courseId');
    }

}

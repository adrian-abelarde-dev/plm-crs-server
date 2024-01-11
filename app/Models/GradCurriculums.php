<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GradClasses;

class GradCurriculums extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculumCode'
    ];

    public function curriculums_class_relationship()
    {
        return $this->belongsToMany(GradClasses::class, 'grad_class_and_curriculum', 'curriculumId', 'courseId');
    }
}

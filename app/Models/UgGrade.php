<?php

// app/Models/UgGrade.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UgGrade extends Model
{
    protected $fillable = [
        'subjectId',
        'studentId',
        'facultyId',
        'grade',
        'aysem',
        'remarks',
    ];

    // Define relationships or additional methods if needed
}

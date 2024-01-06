<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    use HasFactory;

    protected $table = 'student_terms';

    protected $fillable = [
        'studentId',
        'programId',
        'collegeId',
        'blockId',
        'yearLevel',
        'studentStatus',
        'studentType',
        'aysem',
        'isEnrolled',
        'scholasticStatus',
        'isGraduating',
    ];

    protected $casts = [
        'isEnrolled' => 'boolean',
        'isGraduating' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'studentId');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'programId');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'collegeId');
    }
}

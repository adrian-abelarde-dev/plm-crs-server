<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    use HasFactory;

    protected $table = 'studentTerms';

    protected $fillable = [
        'programID',
        'collegeID',
        'blockID', 
        'yearLevel',
        'studentStatus',
        'studentType',
        'aysem',
        'isEnrolled',
        'scholasticStatus',
        'isGraduating'
    ];

    
}

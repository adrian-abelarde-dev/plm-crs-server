<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GradClasses;

class Faculty extends Model
{
    protected $fillable = [
        'userId',
        'tinNumber',
        'gsisNumber',
        'pedigree',
        'instructorCode',
        'onGraduate',
    ];

    public function classes()
    {
        return $this->hasMany(GradClasses::class, 'facultyId');
    }
}

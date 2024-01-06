<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentHistory extends Model
{
    use HasFactory;

    protected $table = 'assessmentHistories';

    protected $fillable = ['yearTerm', 'totalTuition', 'paidAmount', 'balance', 'studentID'];

    public function student()
    {
        return $this->belongsTo(GradStudent::class);
    }

}

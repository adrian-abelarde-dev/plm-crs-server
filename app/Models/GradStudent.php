<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class GradStudent extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'studentID',
        'userID',
        'balanceID',
        'paymentHistoryID',
        'assessmentHistoryID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function balance()
    {
        return $this->belongsTo(Balance::class, 'balanceID');
    }

    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class, 'studentID');
    }

    public function assessmentHistories()
    {
        return $this->hasMany(AssessmentHistory::class, 'studentID');
    }
}
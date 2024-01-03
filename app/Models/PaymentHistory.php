<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $table = 'paymentHistories';

    protected $fillable = [
        'paymentType',
        'paymentMethod',
        'yearTerm',
        'orNumber',
        'amount',
        'code',
        'remarks',
        'studentID'
    ];

    public function student()
    {
        return $this->belongsTo(GradStudent::class);
    }
}

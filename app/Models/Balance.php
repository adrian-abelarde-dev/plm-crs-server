<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'balances';

    protected $fillable = [
        'yearTerm',
        'termsOfPayment',
        'balanceStatus',
        'assessment',
        'tuitionFeePerUnit',
        'units',
        'tuitionUnitsTotal',
        'miscFees',
        'otherFees',
        'totalAmount',
        'paidAmount',
        'overallPaid',
        'overallBalance',
        'amountToBePaid',
    ];

    protected $casts = [
        'miscFees' => 'json',
        'otherFees' => 'json',
    ];

    public function student()
    {
        return $this->hasMany(GradStudent::class);
    }

}

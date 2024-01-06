<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'programId';

    protected $keyType = 'string'; // Set the key type to string

    protected $fillable = [
        'programId',
        'collegeId',
        'programName',
        'status',
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'collegeId');
    }
}

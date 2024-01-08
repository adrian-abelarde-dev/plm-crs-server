<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subjects extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'subjectId';
    protected $keyType = 'string';
    protected $fillable = [
        'subjectId',
        'subjectName',
        'subjectType',
        'updatedBy',
        'status'
    ];
}

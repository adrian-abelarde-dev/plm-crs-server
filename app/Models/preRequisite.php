<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preRequisite extends Model
{
    use HasFactory;

    protected $table= 'preRequisites';

    protected $fillable = [
        'courseID',
        'preRequisiteTo'
    ];
}

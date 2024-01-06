<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassHours extends Model
{
    use HasFactory;

    protected $table = 'classHours';

    protected $fillable = [
        'scheduleID',
        'courseScheduleID',
        'roomID',
        'day',
        'start',
        'finish',
        'aysem'
    ];
}

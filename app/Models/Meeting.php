<?php

// app/Models/Meeting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $primaryKey = 'meetingId'; // Specify the primary key
    protected $keyType = 'string';
    protected $fillable = [
        'meetingId', 
        'label', 
        'meetingType', 
        'college', 
        'status'
    ];
}

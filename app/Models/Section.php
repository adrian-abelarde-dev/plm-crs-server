<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $primaryKey = 'sectionID';
    protected $table = 'sections';
    protected $fillable = [
        'sectionName',
        'collegeID',
        'programID',
        'yearLevel',
        'aysem',
        'updatedBy',
        'status'
    ];

}

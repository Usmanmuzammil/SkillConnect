<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendenceSheet extends Model
{
    protected $table = 'attendence_sheets';

    protected $fillable = [
        'title',
        'department',
        'image',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table= 'courses';

    protected $fillable = [
        'course_title',
        'link',
        'image',
        'price',
        'duration',
        'whatsapp_num',
    ];
}
